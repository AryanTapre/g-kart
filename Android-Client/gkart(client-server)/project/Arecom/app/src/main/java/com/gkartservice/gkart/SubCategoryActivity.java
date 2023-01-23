package com.gkartservice.gkart;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.view.MenuItem;
import android.widget.Toast;

import com.gkartservice.gkart.Adapters.SubCategoryAdapter;
import com.gkartservice.gkart.PojoClasses.SubCategoryPojo;
import com.gkartservice.gkart.ServerConnectivity.AppUtility;
import com.gkartservice.gkart.ServerConnectivity.UserServices;

import org.json.JSONException;
import org.json.JSONObject;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class SubCategoryActivity extends AppCompatActivity {
RecyclerView recyclerView;
UserServices userServices;
SubCategoryAdapter subCategoryAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sub_category);
        ActionBar actionBar = getSupportActionBar();
        actionBar.setTitle("Sub Category");
        actionBar.setDisplayHomeAsUpEnabled(true);

        recyclerView = findViewById(R.id.subcategory_recycler_view);
        userServices = AppUtility.getUserServices();
        String catid = getIntent().getStringExtra("catid");
        JSONObject json = new JSONObject();
        try
        {
            json.put("cat_id",catid);
        }
        catch (JSONException e)
        {
            e.printStackTrace();
        }
        String data = json.toString();
        sendData(data);
    }

    public void sendData(String data)
    {
        userServices.subCategoryRequest("subcategory",data)
                .enqueue(new Callback<SubCategoryPojo>() {
                    @Override
                    public void onResponse(Call<SubCategoryPojo> call, Response<SubCategoryPojo> response) {
                        if(response.isSuccessful())
                        {
                            SubCategoryPojo data  = response.body();
                            if(data.getStatus().equals("1"))
                            {
                                subCategoryAdapter = new SubCategoryAdapter(data.getListFetched(),SubCategoryActivity.this);
                                recyclerView.setAdapter(subCategoryAdapter);
                                subCategoryAdapter.notifyDataSetChanged();
                                recyclerView.setLayoutManager(new LinearLayoutManager(SubCategoryActivity.this));

                            }
                        }
                    }

                    @Override
                    public void onFailure(Call<SubCategoryPojo> call, Throwable t) {
                        Toast.makeText(SubCategoryActivity.this,"sub category status is 0",Toast.LENGTH_SHORT).show();
                    }
                });
    }

    @Override
    public boolean onOptionsItemSelected(@NonNull MenuItem item) {
        switch (item.getItemId()) {
            case android.R.id.home:
                this.finish();
                return true;
        }
        return super.onOptionsItemSelected(item);
    }
}