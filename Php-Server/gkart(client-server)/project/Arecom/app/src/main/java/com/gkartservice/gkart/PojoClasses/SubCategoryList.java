package com.gkartservice.gkart.PojoClasses;

import com.google.gson.annotations.SerializedName;

public class SubCategoryList {

    @SerializedName("s_c_id")
    String s_c_id;
    @SerializedName("s_c_name")
    String s_c_name;
    @SerializedName("s_c_pic")
    String s_c_pic;
    @SerializedName("s_c_desc")
    String s_c_desc;

    public String getS_c_id() {
        return s_c_id;
    }

    public void setS_c_id(String s_c_id) {
        this.s_c_id = s_c_id;
    }

    public String getS_c_name() {
        return s_c_name;
    }

    public void setS_c_name(String s_c_name) {
        this.s_c_name = s_c_name;
    }

    public String getS_c_pic() {
        return s_c_pic;
    }

    public void setS_c_pic(String s_c_pic) {
        this.s_c_pic = s_c_pic;
    }

    public String getS_c_desc() {
        return s_c_desc;
    }

    public void setS_c_desc(String s_c_desc) {
        this.s_c_desc = s_c_desc;
    }
}
