package com.gkartservice.gkart;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.view.MenuItem;
import android.widget.Toast;

import com.gkartservice.gkart.Adapters.ProductAdapter;
import com.gkartservice.gkart.PojoClasses.ProductPojo;
import com.gkartservice.gkart.ServerConnectivity.AppUtility;
import com.gkartservice.gkart.ServerConnectivity.UserServices;

import org.json.JSONException;
import org.json.JSONObject;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ProductActivity extends AppCompatActivity {
RecyclerView recyclerView;
UserServices userServices;
ProductAdapter productAdapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product);
        ActionBar actionBar = getSupportActionBar();
        actionBar.setTitle("Products");
        actionBar.setDisplayHomeAsUpEnabled(true);

        recyclerView = findViewById(R.id.product_recycler_view);
        userServices = AppUtility.getUserServices();
        String scid = getIntent().getStringExtra("scid");
        JSONObject json = new JSONObject();

        try
        {
            json.put("s_c_id",scid);
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
        userServices.productRequest("product",data)
                .enqueue(new Callback<ProductPojo>() {
                    @Override
                    public void onResponse(Call<ProductPojo> call, Response<ProductPojo> response) {
                        if(response.isSuccessful())
                        {
                            ProductPojo data = response.body();
                            if(data.getStatus().equals("1"))
                            {
                                productAdapter = new ProductAdapter(data.getListFetched(),ProductActivity.this);
                                recyclerView.setAdapter(productAdapter);

                                GridLayoutManager gridLayoutManager = new GridLayoutManager(ProductActivity.this,2);
                                recyclerView.setLayoutManager(gridLayoutManager);
                            }
                        }
                    }

                    @Override
                    public void onFailure(Call<ProductPojo> call, Throwable t) {
                        Toast.makeText(getApplicationContext(),"product status is 0",Toast.LENGTH_SHORT).show();
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