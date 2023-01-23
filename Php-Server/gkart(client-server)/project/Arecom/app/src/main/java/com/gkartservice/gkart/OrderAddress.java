package com.gkartservice.gkart;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.gkartservice.gkart.Database.SharedPrefManager;
import com.gkartservice.gkart.PojoClasses.OrderPojo;
import com.gkartservice.gkart.ServerConnectivity.AppUtility;
import com.gkartservice.gkart.ServerConnectivity.UserServices;

import org.json.JSONException;
import org.json.JSONObject;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class OrderAddress extends AppCompatActivity {
    EditText address;
    EditText zipcode;

    String p_id,p_price,u_id,o_date,ship_address,ship_zipcode="394230",qty="1",p_name,p_image;
    SharedPrefManager spm;
    Button proceed;

    UserServices userServices;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order_address);
        userServices = AppUtility.getUserServices();

        address = findViewById(R.id.et_address);
        zipcode = findViewById(R.id.et_zipcode);
        proceed = findViewById(R.id.proceed);


        p_id = getIntent().getStringExtra("p_id");
        p_price = getIntent().getStringExtra("p_price");
        p_name = getIntent().getStringExtra("p_name");
        p_image = getIntent().getStringExtra("p_image");

        spm = new SharedPrefManager(this);
        u_id = spm.getSpUserId();

        o_date = String.valueOf(android.text.format.DateFormat.format("yyyy-MM-dd", new java.util.Date()));
        ship_address = address.getText().toString();
        ship_zipcode = zipcode.getText().toString();
        ship_zipcode="394230";


        proceed.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                JSONObject json = new JSONObject();
                try
                {
                    json.put("p_id",p_id);
                    json.put("u_id",u_id);
                    json.put("o_date",o_date);
                    json.put("o_amount",p_price);
                    json.put("o_ship_address",ship_address);
                    json.put("o_zipcode",ship_zipcode);
                    json.put("quantity",qty);
                    json.put("p_name",p_name);
                    json.put("p_image",p_image);

                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }

                String data = json.toString();
                sendOrder(data);

            }
        });


    }

    public void sendOrder(String data)
    {
        userServices.orderRequest("order",data)
                .enqueue(new Callback<OrderPojo>() {
                    @Override
                    public void onResponse(Call<OrderPojo> call, Response<OrderPojo> response) {
                        if(response.isSuccessful())
                        {
                            OrderPojo data = response.body();
                            if(data.getStatus().equals("1"))
                            {
                                ship_address = address.getText().toString();
                                Toast.makeText(OrderAddress.this,ship_address,Toast.LENGTH_SHORT).show();
                                Toast.makeText(OrderAddress.this,"order placed ",Toast.LENGTH_SHORT).show();
//                                Intent i = new Intent(OrderAddress.this,BaseActivity.class);
//                                startActivity(i);
                            }
                        }
                    }

                    @Override
                    public void onFailure(Call<OrderPojo> call, Throwable t) {

                    }
                });
    }
}