package com.gkartservice.gkart.PojoClasses;

import com.google.gson.annotations.SerializedName;

public class ProductList {

    @SerializedName("p_id")
    String p_id;
    @SerializedName("p_name")
    String p_name;
    @SerializedName("p_code")
    String p_code;
    @SerializedName("p_status")
    String p_status;
    @SerializedName("p_date")
    String p_date;
    @SerializedName("p_image")
    String p_image;
    @SerializedName("p_stock")
    String p_stock;
    @SerializedName("p_price")
    String p_price;
    @SerializedName("p_desc")
    String p_desc;

    public String getP_id() {
        return p_id;
    }

    public void setP_id(String p_id) {
        this.p_id = p_id;
    }

    public String getP_name() {
        return p_name;
    }

    public void setP_name(String p_name) {
        this.p_name = p_name;
    }

    public String getP_code() {
        return p_code;
    }

    public void setP_code(String p_code) {
        this.p_code = p_code;
    }

    public String getP_status() {
        return p_status;
    }

    public void setP_status(String p_status) {
        this.p_status = p_status;
    }

    public String getP_date() {
        return p_date;
    }

    public void setP_date(String p_date) {
        this.p_date = p_date;
    }

    public String getP_image() {
        return p_image;
    }

    public void setP_image(String p_image) {
        this.p_image = p_image;
    }

    public String getP_stock() {
        return p_stock;
    }

    public void setP_stock(String p_stock) {
        this.p_stock = p_stock;
    }

    public String getP_price() {
        return p_price;
    }

    public void setP_price(String p_price) {
        this.p_price = p_price;
    }

    public String getP_desc() {
        return p_desc;
    }

    public void setP_desc(String p_desc) {
        this.p_desc = p_desc;
    }
}
