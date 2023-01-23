package com.gkartservice.gkart.ui.home;

import android.app.Activity;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.ViewModelProvider;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.gkartservice.gkart.Adapters.CategoryAdapter;
import com.gkartservice.gkart.PojoClasses.CategoryPojo;
import com.gkartservice.gkart.R;
import com.gkartservice.gkart.ServerConnectivity.AppUtility;
import com.gkartservice.gkart.ServerConnectivity.UserServices;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class HomeFragment extends Fragment {
RecyclerView recyclerView;
    UserServices userServices;
    CategoryAdapter categoryAdapter;
    Activity act;

    public View onCreateView(@NonNull LayoutInflater inflater,
            ViewGroup container, Bundle savedInstanceState) {

        View root = inflater.inflate(R.layout.fragment_home, container, false);
        recyclerView = root.findViewById(R.id.home_recycler_view);
        userServices = AppUtility.getUserServices();
        getCategory();
        return root;

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
                                categoryAdapter = new CategoryAdapter(getActivity(),data.getListFetched());
                                recyclerView.setAdapter(categoryAdapter);
                                categoryAdapter.notifyDataSetChanged();

//                                LinearLayoutManager linearLayoutManager = new LinearLayoutManager(HomeActivity.this);
//                                recyclerView.setLayoutManager(linearLayoutManager);
                                  GridLayoutManager gridLayoutManager = new GridLayoutManager(act,2);
                                 recyclerView.setLayoutManager(gridLayoutManager);
                            }
                        }
                    }

                    @Override
                    public void onFailure(Call<CategoryPojo> call, Throwable t) {
                        Toast.makeText(act,"category status is 0",Toast.LENGTH_SHORT).show();
                    }
                });
    }
}