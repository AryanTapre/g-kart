package com.gkartservice.gkart.ServerConnectivity;

public class AppUtility {

    public static final String BASE_URL = "http://192.168.16.63/ecomarr/";

    public static UserServices getUserServices()
    {
        return RetrofitClient.getClient(BASE_URL).create(UserServices.class);
    }
}
