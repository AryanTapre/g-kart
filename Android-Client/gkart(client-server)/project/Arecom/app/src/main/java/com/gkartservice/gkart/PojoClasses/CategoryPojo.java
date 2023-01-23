package com.gkartservice.gkart.PojoClasses;

import com.gkartservice.gkart.Adapters.CategoryAdapter;
import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

public class CategoryPojo {

    @SerializedName("message")
    String message;
    @SerializedName("status")
    String status;
    @SerializedName("listFetched")
    ArrayList<CategoryList> listFetched;

    public CategoryPojo(String message, String status, ArrayList<CategoryList> listFetched) {
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

    public ArrayList<CategoryList> getListFetched() {
        return listFetched;
    }

    public void setListFetched(ArrayList<CategoryList> listFetched) {
        this.listFetched = listFetched;
    }
}
