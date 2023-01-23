package com.gkartservice.gkart.Adapters;

import android.app.Activity;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.gkartservice.gkart.PojoClasses.SubCategoryList;
import com.gkartservice.gkart.ProductActivity;
import com.gkartservice.gkart.R;

import java.util.ArrayList;

import static com.gkartservice.gkart.ServerConnectivity.AppUtility.BASE_URL;

public class SubCategoryAdapter extends RecyclerView.Adapter<SubCategoryAdapter.viewHolder> {
ArrayList<SubCategoryList> list;
Activity act;

    public SubCategoryAdapter(ArrayList<SubCategoryList> list, Activity act) {
        this.list = list;
        this.act = act;
    }

    @NonNull
    @Override
    public viewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(act).inflate(R.layout.subcategory_layout,parent,false);
        return new viewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull viewHolder holder, int position) {
        SubCategoryList index = list.get(position);
        holder.sub_cat_name.setText(index.getS_c_name());
        Glide.with(act).load(BASE_URL+index.getS_c_pic()).error(R.mipmap.ic_launcher).into(holder.sub_cat_image);

        holder.sub_cat_image.setOnClickListener(new View.OnClickListener() {
            String scid = index.getS_c_id();
            @Override
            public void onClick(View v) {
                Intent i = new Intent(act, ProductActivity.class);
                i.putExtra("scid",scid);
                act.startActivity(i);
            }
        });

    }

    @Override
    public int getItemCount() {
        return list.size();
    }

    public class viewHolder extends RecyclerView.ViewHolder {
        public TextView sub_cat_name;
        public ImageView sub_cat_image;
        public viewHolder(@NonNull View itemView) {
            super(itemView);
            sub_cat_name = itemView.findViewById(R.id.sub_cat_name);
            sub_cat_image = itemView.findViewById(R.id.sub_cat_image);
        }
    }
}
