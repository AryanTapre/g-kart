package com.gkartservice.gkart.Adapters;

import android.app.Activity;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.gkartservice.gkart.DisplayProduct;
import com.gkartservice.gkart.PojoClasses.ProductList;
import com.gkartservice.gkart.R;

import java.util.ArrayList;

import static com.gkartservice.gkart.ServerConnectivity.AppUtility.BASE_URL;

public class ProductAdapter extends RecyclerView.Adapter<ProductAdapter.viewHolder> {
ArrayList<ProductList> list;
Activity act;

    public ProductAdapter(ArrayList<ProductList> list, Activity act) {
        this.list = list;
        this.act = act;
    }

    @NonNull
    @Override
    public viewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(act).inflate(R.layout.product_layout,parent,false);
        return new viewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull viewHolder holder, int position) {
        ProductList index = list.get(position);
        holder.product_name.setText(index.getP_name());
        Glide.with(act).load(BASE_URL+index.getP_image()).error(R.mipmap.ic_launcher).into(holder.product_image);

        holder.product_image.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(v.getContext(),index.getP_name(),Toast.LENGTH_SHORT).show();
                Intent i = new Intent(act, DisplayProduct.class);
                i.putExtra("pid",index.getP_id());
                i.putExtra("pname",index.getP_name());
                i.putExtra("pcode",index.getP_code());
                i.putExtra("pstatus",index.getP_status());
                i.putExtra("pdate",index.getP_date());
                i.putExtra("pimage",index.getP_image());
                i.putExtra("pstock",index.getP_stock());
                i.putExtra("pprice",index.getP_price());
                i.putExtra("pdesc",index.getP_desc());
                act.startActivity(i);
            }
        });

    }

    @Override
    public int getItemCount() {
        return list.size();
    }

    public class  viewHolder extends RecyclerView.ViewHolder {
        public TextView product_name;
        public ImageView product_image;
        public viewHolder(@NonNull View itemView)
        {
            super(itemView);
            product_name = itemView.findViewById(R.id.product_name);
            product_image = itemView.findViewById(R.id.product_image);
        }
    }

}
