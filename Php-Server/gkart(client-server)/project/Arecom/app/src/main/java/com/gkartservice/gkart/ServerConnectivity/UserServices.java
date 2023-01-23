package com.gkartservice.gkart.ServerConnectivity;

import com.gkartservice.gkart.PojoClasses.CategoryPojo;
import com.gkartservice.gkart.PojoClasses.LoginPojo;
import com.gkartservice.gkart.PojoClasses.MyOrdersPojo;
import com.gkartservice.gkart.PojoClasses.OrderPojo;
import com.gkartservice.gkart.PojoClasses.ProductPojo;
import com.gkartservice.gkart.PojoClasses.RegisterPojo;
import com.gkartservice.gkart.PojoClasses.SubCategoryPojo;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface UserServices {

    @FormUrlEncoded
    @POST("AdminApi.php")
    Call<LoginPojo> loginRequest(@Field("gkart") String gkart,@Field("g_data") String g_data);

    @FormUrlEncoded
    @POST("AdminApi.php")
    Call<RegisterPojo> registerRequest(@Field("gkart") String gkart, @Field("g_data") String g_data);

    @FormUrlEncoded
    @POST("AdminApi.php")
    Call<CategoryPojo> categoryRequest(@Field("gkart") String gkart);

    @FormUrlEncoded
    @POST("AdminApi.php")
    Call<SubCategoryPojo> subCategoryRequest(@Field("gkart") String gkart, @Field("g_data") String g_data);

    @FormUrlEncoded
    @POST("AdminApi.php")
    Call<ProductPojo> productRequest(@Field("gkart") String gkart, @Field("g_data") String g_data);

    @FormUrlEncoded
    @POST("AdminApi.php")
    Call<OrderPojo> orderRequest(@Field("gkart") String gkart, @Field("g_data") String g_data);

    @FormUrlEncoded
    @POST("AdminApi.php")
    Call<MyOrdersPojo> myOrderRequest(@Field("gkart") String gkart, @Field("g_data") String g_data);




}
