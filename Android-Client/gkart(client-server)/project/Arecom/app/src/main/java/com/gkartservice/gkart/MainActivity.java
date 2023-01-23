package com.gkartservice.gkart;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;

import com.gkartservice.gkart.Database.SharedPrefManager;

public class MainActivity extends AppCompatActivity {
    SharedPrefManager sharedPrefManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        sharedPrefManager = new SharedPrefManager(this);


        Thread thread = new Thread()
        {
            public void run()
            {
                try
                {
                    sleep(500);
                }
                catch (Exception e)
                {
                    e.printStackTrace();
                }
                finally
                {
                    if (sharedPrefManager.getUserLogin()){
                        Intent intent=new Intent(MainActivity.this,BaseActivity.class);
                        startActivity(intent);
                        finish();
                    }
                    else
                    {
                        Intent intent=new Intent(MainActivity.this,LoginActivity.class);
                        startActivity(intent);
                        finish();
                    }

//                    Intent i = new Intent(MainActivity.this,LoginActivity.class);
//                    startActivity(i);
                }
            }
        }; thread.start();

        ActionBar actionBar = getSupportActionBar();
        actionBar.hide();
    }
}