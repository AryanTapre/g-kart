package com.gkartservice.gkart.Adapters;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.fragment.app.FragmentActivity;
import androidx.recyclerview.widget.RecyclerView;
import com.bumptech.glide.Glide;

import com.gkartservice.gkart.Database.SharedPrefManager;
import com.gkartservice.gkart.MainActivity;
import com.gkartservice.gkart.PojoClasses.CategoryList;
import com.gkartservice.gkart.R;
import com.gkartservice.gkart.SubCategoryActivity;

import java.util.ArrayList;

import static com.gkartservice.gkart.ServerConnectivity.AppUtility.BASE_URL;


public class CategoryAdapter extends RecyclerView.Adapter<CategoryAdapter.ViewHolder> {

    private ArrayList<CategoryList> crimelist;
    Activity act;
    ProgressDialog loading;

    public CategoryAdapter(FragmentActivity shopactivity, ArrayList<CategoryList> f_s_data) {
        this.crimelist = f_s_data;
        this.act=shopactivity;
    }

    //Provide a reference to the views for each data item
    //Complex data items may need more than one view per item, and
    //you provide access to all the views for a data item in a view holder
    public static class ViewHolder extends RecyclerView.ViewHolder{
        //each data item is just a string in this case
        public TextView cat_name;
        public ImageView cat_image;
        public ViewHolder(View v) {
            super(v);
            cat_name = v.findViewById(R.id.cat_name);
            cat_image = v.findViewById(R.id.cat_image);


        }
    }

    //Provide a suitable constructor
    public CategoryAdapter(ArrayList<CategoryList> songList){
        this.crimelist = songList;
    }

    //Create new views (invoked by the layout manager)
    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {

        //Creating a new view
        View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.category_layout,parent,false);

        //set the view's size, margins, paddings and layout parameters

        ViewHolder vh = new ViewHolder(v);
        return vh;
    }

    //Replace the contents of a view (invoked by the layout manager
    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {

        // - get element from arraylist at this position
        // - replace the contents of the view with that element

        CategoryList song = crimelist.get(position);
        holder.cat_name.setText("Category:- "+song.getC_name());
        Glide.with(act).load(BASE_URL+song.getC_image()).error(R.mipmap.ic_launcher).into(holder.cat_image);
        holder.cat_image.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(v.getContext(),song.getC_name(),Toast.LENGTH_SHORT).show();
                String cat_id = song.getC_id();
                Intent i = new Intent(act, SubCategoryActivity.class);
                i.putExtra("catid",cat_id);
                act.startActivity(i);

            }
        });
    }



    @Override
    public int getItemCount() {
        Log.e("Size of Order ",""+crimelist.size());
        return crimelist.size();
    }
}
