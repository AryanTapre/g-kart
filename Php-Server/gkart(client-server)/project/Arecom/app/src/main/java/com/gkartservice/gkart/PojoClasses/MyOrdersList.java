package com.gkartservice.gkart.PojoClasses;

import com.google.gson.annotations.SerializedName;

public class MyOrdersList {

    @SerializedName("o_id")
    String o_id;
    @SerializedName("p_id")
    String p_id;
    @SerializedName("u_id")
    String u_id;
    @SerializedName("o_date")
    String o_date;
    @SerializedName("o_amount")
    String o_amount;
    @SerializedName("o_ship_address")
    String o_ship_address;
    @SerializedName("o_zipcode")
    String o_zipcode;
    @SerializedName("quantity")
    String quantity;
    @SerializedName("p_name")
    String p_name;
    @SerializedName("p_image")
    String p_image;

    public String getO_id() {
        return o_id;
    }

    public void setO_id(String o_id) {
        this.o_id = o_id;
    }

    public String getP_id() {
        return p_id;
    }

    public void setP_id(String p_id) {
        this.p_id = p_id;
    }

    public String getU_id() {
        return u_id;
    }

    public void setU_id(String u_id) {
        this.u_id = u_id;
    }

    public String getO_date() {
        return o_date;
    }

    public void setO_date(String o_date) {
        this.o_date = o_date;
    }

    public String getO_amount() {
        return o_amount;
    }

    public void setO_amount(String o_amount) {
        this.o_amount = o_amount;
    }

    public String getO_ship_address() {
        return o_ship_address;
    }

    public void setO_ship_address(String o_ship_address) {
        this.o_ship_address = o_ship_address;
    }

    public String getO_zipcode() {
        return o_zipcode;
    }

    public void setO_zipcode(String o_zipcode) {
        this.o_zipcode = o_zipcode;
    }

    public String getQuantity() {
        return quantity;
    }

    public void setQuantity(String quantity) {
        this.quantity = quantity;
    }

    public String getP_name() {
        return p_name;
    }

    public void setP_name(String p_name) {
        this.p_name = p_name;
    }

    public String getP_image() {
        return p_image;
    }

    public void setP_image(String p_image) {
        this.p_image = p_image;
    }
}
