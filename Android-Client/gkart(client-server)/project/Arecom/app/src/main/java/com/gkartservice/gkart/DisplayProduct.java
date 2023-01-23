package com.gkartservice.gkart;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.gkartservice.gkart.Database.DbHelper;

import java.io.IOException;

import static com.gkartservice.gkart.ServerConnectivity.AppUtility.BASE_URL;

public class DisplayProduct extends AppCompatActivity {
ImageView p_image;
TextView p_name,p_price,p_code,p_desc;
Button addToCart;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_display_product);
        ActionBar actionBar = getSupportActionBar();
        actionBar.setDisplayHomeAsUpEnabled(true);
        p_image = findViewById(R.id.product_image);
        p_name = findViewById(R.id.product_name);
        p_price = findViewById(R.id.product_price);
        p_code = findViewById(R.id.product_code);
        p_desc = findViewById(R.id.product_description);
        addToCart = findViewById(R.id.btn_add_to_cart);

        String id = getIntent().getStringExtra("pid");
        String name = getIntent().getStringExtra("pname");
        String code = getIntent().getStringExtra("pcode");
        String status = getIntent().getStringExtra("pstatus");
        String date = getIntent().getStringExtra("pdate");
        String img = getIntent().getStringExtra("pimage");
        String stock = getIntent().getStringExtra("pstock");
        String price = getIntent().getStringExtra("pprice");
        String desc = getIntent().getStringExtra("pdesc");

        Glide.with(this).load(BASE_URL+img ).error(R.mipmap.ic_launcher).into(p_image);
        actionBar.setTitle(name.toUpperCase());

        p_name.setText(name);
        p_price.setText(price);
        p_code.setText(code);
        p_desc.setText(desc);

        addToCart.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                DbHelper dbHelper = new DbHelper(DisplayProduct.this);
                boolean b = false;
                try
                {
                    b = dbHelper.insertProductCart(id,name,code,status,date,img,stock,price,desc);
                }
                catch (IOException e)
                {
                    e.printStackTrace();
                }
                if(b)
                 {
                     Toast.makeText(getApplicationContext(),"data stored in database",Toast.LENGTH_SHORT).show();
                 }
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