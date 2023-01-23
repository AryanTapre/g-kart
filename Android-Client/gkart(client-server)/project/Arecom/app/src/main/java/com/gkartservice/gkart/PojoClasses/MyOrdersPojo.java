package com.gkartservice.gkart.PojoClasses;

import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

public class MyOrdersPojo {

 @SerializedName("message")
 String message;
 @SerializedName("status")
 String status;
 @SerializedName("listFetched")
 ArrayList<MyOrdersList> listFetched;

    public MyOrdersPojo(String message, String status, ArrayList<MyOrdersList> listFetched) {
        this.message = message;
        this.status = status;
        this.listFetched = listFetched;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public ArrayList<MyOrdersList> getListFetched() {
        return listFetched;
    }

    public void setListFetched(ArrayList<MyOrdersList> listFetched) {
        this.listFetched = listFetched;
    }
}
