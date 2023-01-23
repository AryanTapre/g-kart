package com.gkartservice.gkart;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.gkartservice.gkart.PojoClasses.RegisterPojo;
import com.gkartservice.gkart.ServerConnectivity.AppUtility;
import com.gkartservice.gkart.ServerConnectivity.UserServices;

import org.json.JSONException;
import org.json.JSONObject;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RegisterActivity extends AppCompatActivity {
TextView login;
EditText email,password,repassword;
Button register;
RadioGroup radioGroup;
RadioButton gender;
UserServices userServices;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        login = findViewById(R.id.goto_login);
        email = findViewById(R.id.et_email);
        password = findViewById(R.id.et_password);
        repassword = findViewById(R.id.et_repassword);
        register = findViewById(R.id.btn_register);
        radioGroup = findViewById(R.id.radioGroup);
        userServices = AppUtility.getUserServices();

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(RegisterActivity.this,LoginActivity.class);
                startActivity(i);
            }
        });

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                 doRegister();
            }
        });

        ActionBar actionBar = getSupportActionBar();
        actionBar.hide();
    }

    public void doRegister()
    {
        String data_email,data_password;
        int selectedId = radioGroup.getCheckedRadioButtonId();

        data_email = email.getText().toString();
        data_password = password.getText().toString();
        gender = findViewById(selectedId);
        if(selectedId == -1)
        {
            Toast.makeText(RegisterActivity.this,"select gender",Toast.LENGTH_SHORT).show();
        }
        else
        {
            JSONObject json = new JSONObject();
            try
            {
                    json.put("u_email",data_email);
                    json.put("u_password",data_password);
                    json.put("u_gender",gender.getText());

            }
            catch (JSONException e)
            {
                e.printStackTrace();
            }
            String data = json.toString();
            sendData(data);
        }




    }

    public void sendData(String data)
    {
        Log.e("Data for user register", ""+data);
        userServices.registerRequest("register",data).enqueue(new Callback<RegisterPojo>()
        {
            @Override
            public void onResponse(Call<RegisterPojo> call, Response<RegisterPojo> response)
            {
                if(response.isSuccessful())
                {
                    RegisterPojo ro = response.body();
                    if(ro.getStatus().equals("1"))
                    {
                        String error_message = ro.getMessage();
                        Log.e("success",""+error_message);
                        Toast.makeText(RegisterActivity.this,error_message, Toast.LENGTH_SHORT).show();
                        Intent i = new Intent(RegisterActivity.this,LoginActivity.class);
                        startActivity(i);
                    }
                    else
                    {
                        String error_message = ro.getMessage();
                        Toast.makeText(RegisterActivity.this,error_message, Toast.LENGTH_SHORT).show();
                    }
                }
            }

            @Override
            public void onFailure(Call<RegisterPojo> call, Throwable t)
            {
                Log.e("debug","on failure : ERROR>"+t.toString());
            }
        });
    }
}