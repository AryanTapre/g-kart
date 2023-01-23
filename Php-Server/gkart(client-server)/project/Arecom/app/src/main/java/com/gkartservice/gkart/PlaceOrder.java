package com.gkartservice.gkart;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.gkartservice.gkart.Database.DbHelper;

import static com.gkartservice.gkart.ServerConnectivity.AppUtility.BASE_URL;

public class PlaceOrder extends AppCompatActivity {
    ImageView p_image;
    TextView p_name,p_price,p_code,p_desc;
    Button placeorder;
    Integer i;
    String pid,price,name,code,desc,img;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_place_order);
        p_image = findViewById(R.id.product_image);
        p_name = findViewById(R.id.product_name);
        p_price = findViewById(R.id.product_price);
        p_code = findViewById(R.id.product_code);
        p_desc = findViewById(R.id.product_description);
        placeorder = findViewById(R.id.btn_place_order);

        i = Integer.valueOf(getIntent().getStringExtra("s_id"));
        getProductFromCart(i);

//        Toast.makeText(getApplicationContext(),getIntent().getStringExtra("s_id"),Toast.LENGTH_SHORT).show();

        placeorder.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(getApplicationContext(),OrderAddress.class);
                i.putExtra("p_id",pid);
                i.putExtra("p_price",price);
                i.putExtra("p_name",name);
                i.putExtra("p_image",img);
                startActivity(i);
            }
        });

    }

    public void getProductFromCart(int id)
    {

        DbHelper dbHelper = new DbHelper(this);
        Cursor rs = dbHelper.getProduct(id);
        rs.moveToFirst();
        name =rs.getString(rs.getColumnIndex(DbHelper.P_NAME));
        price = rs.getString(rs.getColumnIndex(DbHelper.P_PRICE));
        code = rs.getString(rs.getColumnIndex(DbHelper.P_CODE));
        desc = rs.getString(rs.getColumnIndex(DbHelper.P_DESCRIPTION));
        img = rs.getString(rs.getColumnIndex(DbHelper.P_IMAGE));
        pid = rs.getString(rs.getColumnIndex(DbHelper.P_ID));

        p_name.setText(name);
        p_code.setText(code);
        p_price.setText(price);
        p_desc.setText(desc);
        Glide.with(this).load(BASE_URL+img ).error(R.mipmap.ic_launcher).into(p_image);
    }


}