package com.gkartservice.gkart.PojoClasses;

import com.google.gson.annotations.SerializedName;

public class CategoryList {
    @SerializedName("c_id")
    String c_id;
    @SerializedName("c_name")
    String c_name;
    @SerializedName("c_desc")
    String c_desc;
    @SerializedName("c_date")
    String c_date;
    @SerializedName("c_image")
    String c_image;

    public String getC_id() {
        return c_id;
    }

    public void setC_id(String c_id) {
        this.c_id = c_id;
    }

    public String getC_name() {
        return c_name;
    }

    public void setC_name(String c_name) {
        this.c_name = c_name;
    }

    public String getC_desc() {
        return c_desc;
    }

    public void setC_desc(String c_desc) {
        this.c_desc = c_desc;
    }

    public String getC_date() {
        return c_date;
    }

    public void setC_date(String c_date) {
        this.c_date = c_date;
    }

    public String getC_image() {
        return c_image;
    }

    public void setC_image(String c_image) {
        this.c_image = c_image;
    }
}
