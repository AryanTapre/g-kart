package com.gkartservice.gkart.PojoClasses;

import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

public class ProductPojo {
    @SerializedName("status")
    String status;
    @SerializedName("message")
    String message;
    @SerializedName("listFetched")
    ArrayList<ProductList> listFetched;

    public ProductPojo(String status, String message, ArrayList<ProductList> listFetched) {
        this.status = status;
        this.message = message;
        this.listFetched = listFetched;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public ArrayList<ProductList> getListFetched() {
        return listFetched;
    }

    public void setListFetched(ArrayList<ProductList> listFetched) {
        this.listFetched = listFetched;
    }
}
