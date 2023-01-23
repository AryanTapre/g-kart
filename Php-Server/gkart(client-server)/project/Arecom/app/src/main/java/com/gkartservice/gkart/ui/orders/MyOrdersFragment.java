package com.gkartservice.gkart.ui.orders;

import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.gkartservice.gkart.Adapters.MyOrderAdapter;
import com.gkartservice.gkart.Database.SharedPrefManager;
import com.gkartservice.gkart.PojoClasses.MyOrdersPojo;
import com.gkartservice.gkart.R;
import com.gkartservice.gkart.ServerConnectivity.AppUtility;
import com.gkartservice.gkart.ServerConnectivity.UserServices;

import org.json.JSONException;
import org.json.JSONObject;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link MyOrdersFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class MyOrdersFragment extends Fragment {
RecyclerView recyclerView;
UserServices userServices;
MyOrderAdapter myOrderAdapter;
    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    public MyOrdersFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment MyOrdersFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static MyOrdersFragment newInstance(String param1, String param2) {
        MyOrdersFragment fragment = new MyOrdersFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view= inflater.inflate(R.layout.fragment_my_orders, container, false);
        recyclerView = view.findViewById(R.id.orders_recycler_view);
        userServices = AppUtility.getUserServices();

        getMyOrders();
        return  view;
    }

    public void getMyOrders()
    {
        SharedPrefManager spm = new SharedPrefManager(getActivity());
        String uid = spm.getSpUserId();

        JSONObject json = new JSONObject();
        try
        {
            json.put("u_id",uid);
        }
        catch (JSONException e)
        {
            e.printStackTrace();
        }
        String data = json.toString();


        userServices.myOrderRequest("displayorder",data)
                .enqueue(new Callback<MyOrdersPojo>() {
                    @Override
                    public void onResponse(Call<MyOrdersPojo> call, Response<MyOrdersPojo> response) {
                        if(response.isSuccessful())
                        {
                            MyOrdersPojo data = response.body();
                            if(data.getStatus().equals("1"))
                            {
                                myOrderAdapter = new MyOrderAdapter(data.getListFetched(),getActivity());
                                recyclerView.setAdapter(myOrderAdapter);
                                myOrderAdapter.notifyDataSetChanged();

                                recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
                            }
                        }
                    }

                    @Override
                    public void onFailure(Call<MyOrdersPojo> call, Throwable t) {
                        Toast.makeText(getActivity(),"unable to load orders",Toast.LENGTH_SHORT).show();
                    }
                });
    }
}