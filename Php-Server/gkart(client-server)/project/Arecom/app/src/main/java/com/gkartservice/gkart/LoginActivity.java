package com.gkartservice.gkart;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.gkartservice.gkart.Database.SharedPrefManager;
import com.gkartservice.gkart.PojoClasses.LoginPojo;
import com.gkartservice.gkart.ServerConnectivity.AppUtility;
import com.gkartservice.gkart.ServerConnectivity.UserServices;
import com.google.gson.Gson;

import org.json.JSONException;
import org.json.JSONObject;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {
EditText email,password;
TextView register;
Button login;
UserServices userServices;
SharedPrefManager sharedPrefManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        userServices = AppUtility.getUserServices();
        ActionBar actionBar = getSupportActionBar();
        actionBar.hide();
        email = findViewById(R.id.et_email);
        password = findViewById(R.id.et_password);
        login = findViewById(R.id.btn_login);
        register = findViewById(R.id.goto_register);
        sharedPrefManager = new SharedPrefManager(this);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                doLogin();
            }
        });

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(LoginActivity.this,RegisterActivity.class);
                startActivity(i);

            }
        });

    }

    public void doLogin()
    {
        String data_email,data_password;
        data_email = email.getText().toString();
        data_password = password.getText().toString();

        JSONObject json = new JSONObject();
        try
        {
            json.put("u_email",data_email);
            json.put("u_password",data_password);

//            {"u_email":"abc@gmail.com","u_password":"abc"}
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

        Log.e("Data for Admin Login",""+data);
        userServices.loginRequest("login", data)
                .enqueue(new Callback<LoginPojo>()
                {
                    @Override
                    public void onResponse(Call<LoginPojo> call, Response<LoginPojo> response)
                    {
                        if (response.isSuccessful())
                        {
                            LoginPojo data=response.body();
                            if (data.getStatus().equals("1"))
                            {
                                String error_message = data.getMessage();
                                Log.e("Success1",""+error_message);
                                Gson gson = new Gson();
                                String json = gson.toJson(data);
                                sharedPrefManager.saveSPString(SharedPrefManager.SP_USER_DATA, json);
                                Toast.makeText(LoginActivity.this, error_message, Toast.LENGTH_SHORT).show();
                                sharedPrefManager.saveSPString(SharedPrefManager.SP_USER_ID,data.getU_id());
                                sharedPrefManager.saveSPBoolean(SharedPrefManager.SP_U_LOGIN, true);

                                Toast.makeText(LoginActivity.this,error_message, Toast.LENGTH_SHORT).show();
                                Intent i = new Intent(LoginActivity.this,BaseActivity.class);
                                startActivity(i);
                            }
                            else
                            {
                                String error_message = data.getMessage();
                                Toast.makeText(LoginActivity.this, error_message, Toast.LENGTH_SHORT).show();
                            }
                        }
                    }

                    @Override
                    public void onFailure(Call<LoginPojo> call, Throwable t)
                    {
                        Log.e("debug", "onFailure: ERROR > " + t.toString());
                    }
                });
    }
}