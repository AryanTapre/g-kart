package com.gkartservice.gkart.Adapters;

import android.app.Activity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.gkartservice.gkart.PojoClasses.MyOrdersList;
import com.gkartservice.gkart.R;

import java.util.ArrayList;

import static com.gkartservice.gkart.ServerConnectivity.AppUtility.BASE_URL;

public class MyOrderAdapter extends RecyclerView.Adapter<MyOrderAdapter.viewHolder>{
ArrayList<MyOrdersList> list ;
Activity act;

    public MyOrderAdapter(ArrayList<MyOrdersList> list, Activity act) {
        this.list = list;
        this.act = act;
    }

    @NonNull
    @Override
    public viewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(act).inflate(R.layout.my_orders_show,parent,false);
        return new viewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull viewHolder holder, int position) {
        MyOrdersList index = list.get(position);
        Glide.with(act).load(BASE_URL+index.getP_image() ).error(R.mipmap.ic_launcher).into(holder.pimg);
        holder.pname.setText(index.getP_name());
        holder.pprice.setText(index.getO_amount());

    }

    @Override
    public int getItemCount() {
        return list.size();
    }

    public class viewHolder extends RecyclerView.ViewHolder {
        ImageView pimg;
        TextView pname,pprice;
        public viewHolder(@NonNull View itemView) {
            super(itemView);
            pimg = itemView.findViewById(R.id.order_image);
            pname = itemView.findViewById(R.id.order_name);
            pprice = itemView.findViewById(R.id.order_price);
        }
    }
}
