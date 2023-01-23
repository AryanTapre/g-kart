package com.gkartservice.gkart.ui.cart;

import android.app.Activity;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;


import com.gkartservice.gkart.Adapters.CartAdapter;
import com.gkartservice.gkart.Database.DbHelper;
import com.gkartservice.gkart.Database.SharedPrefManager;
import com.gkartservice.gkart.PojoClasses.CartPojo;
import com.gkartservice.gkart.R;

import java.util.ArrayList;
import java.util.Map;
import java.util.Set;

public class GalleryFragment extends Fragment {
RecyclerView recyclerView;
Button order;
Activity act;
TextView tv_total;
int totalamount=0;
    ArrayList<CartPojo> list;

    public View onCreateView(@NonNull LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState)
    {
           View root = inflater.inflate(R.layout.fragment_gallery, container, false);
        recyclerView=root.findViewById(R.id.recycler_cart);
        order=root.findViewById(R.id.btn_placeorder);
        tv_total=root.findViewById(R.id.tv_total);
           displayCart();
        order.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                for (int i=0;i<list.size();i++)
                {


                }



            }
        });







        return root;
    }



    public void displayCart()
    {
       list  = new ArrayList<>();
        DbHelper dbHelper = new DbHelper(getActivity());
        Cursor rs = dbHelper.getProductCart();
        int row = rs.getCount();
        String s = Integer.toString(row);
        rs.moveToFirst();

        for(int i=0;i<row;i++)
        {
            for(int j=0;j<1;j++)
            {
                String pid;
                String pname;
                String pcode;
                String pstatus;
                String pdate;
                String pimage;
                String pstock;
                String pprice;
                String pdescription;
                String sid;

                pid = rs.getString(rs.getColumnIndex(DbHelper.P_ID));
                pname = rs.getString(rs.getColumnIndex(DbHelper.P_NAME));
                pcode = rs.getString(rs.getColumnIndex(DbHelper.P_CODE));
                pstatus = rs.getString(rs.getColumnIndex(DbHelper.P_STATUS));
                pdate = rs.getString(rs.getColumnIndex(DbHelper.P_DATE));
                pimage = rs.getString(rs.getColumnIndex(DbHelper.P_IMAGE));
                pstock = rs.getString(rs.getColumnIndex(DbHelper.P_STOCK));
                pprice = rs.getString(rs.getColumnIndex(DbHelper.P_PRICE));
                pdescription = rs.getString(rs.getColumnIndex(DbHelper.P_DESCRIPTION));
                sid = rs.getString(rs.getColumnIndex(DbHelper.SERIAL_ID));
                int amount=Integer.parseInt(pprice);
                totalamount+=amount;
                Integer x = Integer.valueOf(sid);
                int iw = x.intValue();

                list.add(new CartPojo(pid,pname,pcode,pstatus,pdate,pimage,pstock,pprice,pdescription,iw));

            }
            rs.moveToNext();
        }
        tv_total.setText("Rs."+totalamount);
        CartAdapter cartAdapter = new CartAdapter(getActivity(),list);
        recyclerView.setAdapter(cartAdapter);
        LinearLayoutManager linearLayoutManager = new LinearLayoutManager(act);
        recyclerView.setLayoutManager(linearLayoutManager);
    }



}