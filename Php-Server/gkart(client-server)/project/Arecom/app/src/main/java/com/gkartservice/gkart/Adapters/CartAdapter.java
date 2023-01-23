package com.gkartservice.gkart.Adapters;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.database.Cursor;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.cardview.widget.CardView;
import androidx.fragment.app.FragmentActivity;
import androidx.recyclerview.widget.RecyclerView;


import com.gkartservice.gkart.Database.DbHelper;
import com.gkartservice.gkart.PlaceOrder;
import com.gkartservice.gkart.PojoClasses.CartPojo;
import com.gkartservice.gkart.R;

import java.util.ArrayList;




public class CartAdapter extends RecyclerView.Adapter<CartAdapter.ViewHolder> {

    private ArrayList<CartPojo> crimelist;
    Activity act;
    ProgressDialog loading;

    public CartAdapter(FragmentActivity shopactivity, ArrayList<CartPojo> f_s_data) {
        this.crimelist = f_s_data;
        this.act=shopactivity;
    }

    //Provide a reference to the views for each data item
    //Complex data items may need more than one view per item, and
    //you provide access to all the views for a data item in a view holder
    public static class ViewHolder extends RecyclerView.ViewHolder{
        //each data item is just a string in this case
        public TextView name,price;
        public ImageView remove;
        CardView card;

        public ViewHolder(View v) {
            super(v);
            name = v.findViewById(R.id.item_name);
            price = v.findViewById(R.id.item_price);
            remove=v.findViewById(R.id.item_remove);
            card = v.findViewById(R.id.card_view);
        }
    }

    //Provide a suitable constructor
    public CartAdapter(ArrayList<CartPojo> songList){
        this.crimelist = songList;
    }

    //Create new views (invoked by the layout manager)
    @Override
    public CartAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {

        //Creating a new view
        View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.cart_layout,parent,false);

        //set the view's size, margins, paddings and layout parameters

        ViewHolder vh = new ViewHolder(v);
        return vh;
    }

    //Replace the contents of a view (invoked by the layout manager
    @Override
    public void onBindViewHolder(CartAdapter.ViewHolder holder, int position) {

        // - get element from arraylist at this position
        // - replace the contents of the view with that element

        CartPojo song = crimelist.get(position);
        holder.name.setText(song.getPname());
        holder.price.setText("Rs."+song.getPprice());
        holder.remove.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    DbHelper dbHelper = new DbHelper(act);
                    dbHelper.deleteItem(String.valueOf(song.getSid()));
                    crimelist.remove(position);
                    notifyDataSetChanged();
                }
                     });

        holder.card.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                int i = song.getSid();
                String sid = String.valueOf(i);
                Intent x = new Intent(act, PlaceOrder.class);
                x.putExtra("s_id",sid);
                act.startActivity(x);
            }
        });




    }



    @Override
    public int getItemCount() {
        Log.e("Size of Order ",""+crimelist.size());
        return crimelist.size();
    }
}
