package com.gkartservice.gkart;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.widget.Toast;

import com.gkartservice.gkart.Adapters.CategoryAdapter;
import com.gkartservice.gkart.Database.SharedPrefManager;
import com.gkartservice.gkart.PojoClasses.CategoryPojo;
import com.gkartservice.gkart.ServerConnectivity.AppUtility;
import com.gkartservice.gkart.ServerConnectivity.UserServices;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class HomeActivity extends AppCompatActivity {
RecyclerView recyclerView;
UserServices userServices;
CategoryAdapter categoryAdapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        Toast.makeText(getApplicationContext(), SharedPrefManager.SP_USER_ID,Toast.LENGTH_SHORT).show();

        setContentView(R.layout.activity_home);
        recyclerView = findViewById(R.id.category_recycler_view);
        userServices = AppUtility.getUserServices();
        recyclerView.setHasFixedSize(true);
        ActionBar actionBar = getSupportActionBar();
        actionBar.hide();
        getCategory();
    }

    public void getCategory()
    {
        userServices.categoryRequest("category")
                .enqueue(new Callback<CategoryPojo>() {
                    @Override
                    public void onResponse(Call<CategoryPojo> call, Response<CategoryPojo> response) {

                        if(response.isSuccessful())
                        {
                            CategoryPojo data = response.body();
                            if(data.getStatus().equals("1"))
                            {
                                categoryAdapter = new CategoryAdapter(HomeActivity.this,data.getListFetched());
                                recyclerView.setAdapter(categoryAdapter);
                                categoryAdapter.notifyDataSetChanged();

//                                LinearLayoutManager linearLayoutManager = new LinearLayoutManager(HomeActivity.this);
//                                recyclerView.setLayoutManager(linearLayoutManager);
                                GridLayoutManager gridLayoutManager = new GridLayoutManager(HomeActivity.this,2);
                                recyclerView.setLayoutManager(gridLayoutManager);

                            }
                        }
                    }

                    @Override
                    public void onFailure(Call<CategoryPojo> call, Throwable t) {
                        Toast.makeText(getApplicationContext(),"category status is 0",Toast.LENGTH_SHORT).show();

                    }
                });
    }
}