@extends('adminMaster')

@section('title', 'My Account')

@section('content')

<style>
    .label{
        margin-top:10px;
        font-size:20px;
        font-family: Chalkduster;
        color: #606060;
    }

    .t{
        margin-top:10px;
        font-size:29px;
        font-family: Chalkduster;
        color: #606060;
    }

    .abc{
            background-color:#F0F0F0; width:100%; height:100%; border-radius:10px; text-align:center; padding-top:10px; padding-bottom:10px;
        }

    .abc:hover{
        background-color:white;
    }

    .cde:hover{
        border:2px solid #CD454B; 
        border-radius:10px;
    }

    .cardview{
        border: none;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;
        margin:0;
        padding:30px; 
        
    }

    .icon{
        width: 200px;
        height: 200px;
        border-radius:50%;
    }

    .icon1{
        width: 300px;
        height: 300px;
        border-radius:50%;
    }

    .upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    }

    .upload {
    /* border: 2px solid #CD454B; */
    color: white;
    background-color: #CD454B;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 16px;
    }

    .upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    }

    .upload:hover{
        background-color:gray;
        color:white;
    }

</style>

@php $uID =0 @endphp

<div class="container">
    @foreach($reject as $d)
    <div class="row">
        <div class="col-lg-12">
            <div class="card cardview">
                <div class="row">
                    <div class="col-lg-12" style="padding:80px">
                        <h3 class="type title" style="font-size:28px"> <b>CHECK AND ACCEPT?</b></h3>   
                        <br><br>
                        <form method="post" action="{{ url('/api/checked')}}" enctype="multipart/form-data">

                            <input type="hidden" value={{$d->dishID}} name="dishID">
                            <input type="hidden" value={{$d->id}} name="postID">
                            <input type="hidden" value={{$admin}} name="admin">
                            <input type="hidden" value={{$d->reviewerID}} name="reviewerID">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dish's Name</label>
                                        <input type="text" class="form-control" id="name" name="name" style="border-radius:5px" placeholder="LokLak Beef" required value="{{$d->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Main Category</label>
                                        <select class="form-control" id="main-cat" name="main-cat" style="border-radius:5px" onchange="showInput()">
                                            @if($d->main_cat == "Food")
                                                <option value="Food" selected>Food</option>
                                                <option value="Drink">Drink</option>
                                                <option value="Dessert">Desserts & Bakes</option>
                                            @elseif($d->main_cat == "Drink")
                                                <option value="Food">Food</option>
                                                <option value="Drink" selected>Drink</option>
                                                <option value="Dessert">Desserts & Bakes</option>
                                            @else
                                                <option value="Food">Food</option>
                                                <option value="Drink">Drink</option>
                                                <option value="Dessert" selected>Desserts & Bakes</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        @if($d->main_cat == "Food")
                                            <select class="form-control" id="food" name="food" style="border-radius:5px">
                                                @if($d->category == "Vegetarian")
                                                    <option value="Vegetarian" selected>Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->category == "Meat Lover")
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover" selected>Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->category == "Healthy")
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy" selected>Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->category == "Spicy Lover")
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover" selected>Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @else
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other" selected>Other</option>
                                                @endif
                                            </select>
                                            <select class="form-control" id="drink" name="drink" style="border-radius:5px" hidden>
                                                @if($d->type == "Smoothie")
                                                    <option value="Smoothie" selected>Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic">Alcoholic</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Juice")
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice" selected>Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic">Alcoholic</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Energy Drink")
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink" selected>Energy Drink</option>
                                                    <option value="Alcoholic Lover">Alcoholic Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Alcoholic")
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic" selected>Alcoholic</option>
                                                    <option value="Other">Other</option>
                                                @else
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic">Alcoholic</option>
                                                    <option value="Other" selected>Other</option>
                                                @endif
                                            </select>
                                            <select class="form-control" id="dessert" name="dessert" style="border-radius:5px" hidden>
                                                @if($d->type == "Cookie")
                                                    <option value="Cookie" selected>Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Cake")
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake" selected>Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Chocolate")
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate" selected>Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Ice Cream")
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream" selected>Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @else
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other" selected>Other</option>
                                                @endif
                                            </select>
                                        @elseif($d->main_cat == "Drink")
                                            <select class="form-control" id="food" name="food" style="border-radius:5px" hidden>
                                                @if($d->category == "Vegetarian")
                                                    <option value="Vegetarian" selected>Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->category == "Meat Lover")
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover" selected>Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->category == "Healthy")
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy" selected>Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->category == "Spicy Lover")
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover" selected>Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @else
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other" selected>Other</option>
                                                @endif
                                            </select>
                                            <select class="form-control" id="drink" name="drink" style="border-radius:5px">
                                                @if($d->type == "Smoothie")
                                                    <option value="Smoothie" selected>Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic">Alcoholic</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Juice")
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice" selected>Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic">Alcoholic</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Energy Drink")
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink" selected>Energy Drink</option>
                                                    <option value="Alcoholic Lover">Alcoholic Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Alcoholic")
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic" selected>Alcoholic</option>
                                                    <option value="Other">Other</option>
                                                @else
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic">Alcoholic</option>
                                                    <option value="Other" selected>Other</option>
                                                @endif
                                            </select>
                                            <select class="form-control" id="dessert" name="dessert" style="border-radius:5px" hidden>
                                                @if($d->type == "Cookie")
                                                    <option value="Cookie" selected>Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Cake")
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake" selected>Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Chocolate")
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate" selected>Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Ice Cream")
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream" selected>Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @else
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other" selected>Other</option>
                                                @endif
                                            </select>
                                        @else
                                            <select class="form-control" id="food" name="food" style="border-radius:5px" hidden>
                                                @if($d->category == "Vegetarian")
                                                    <option value="Vegetarian" selected>Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->category == "Meat Lover")
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover" selected>Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->category == "Healthy")
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy" selected>Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->category == "Spicy Lover")
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover" selected>Spicy Lover</option>
                                                    <option value="Other">Other</option>
                                                @else
                                                    <option value="Vegetarian">Vegetarian</option>
                                                    <option value="Meat Lover">Meat Lover</option>
                                                    <option value="Healthy">Healthy</option>
                                                    <option value="Spicy Lover">Spicy Lover</option>
                                                    <option value="Other" selected>Other</option>
                                                @endif
                                            </select>
                                            <select class="form-control" id="drink" name="drink" style="border-radius:5px" hidden>
                                                @if($d->type == "Smoothie")
                                                    <option value="Smoothie" selected>Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic">Alcoholic</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Juice")
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice" selected>Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic">Alcoholic</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Energy Drink")
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink" selected>Energy Drink</option>
                                                    <option value="Alcoholic Lover">Alcoholic Lover</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Alcoholic")
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic" selected>Alcoholic</option>
                                                    <option value="Other">Other</option>
                                                @else
                                                    <option value="Smoothie">Smoothie</option>
                                                    <option value="Juice">Juice</option>
                                                    <option value="Energy Drink">Energy Drink</option>
                                                    <option value="Alcoholic">Alcoholic</option>
                                                    <option value="Other" selected>Other</option>
                                                @endif
                                            </select>
                                            <select class="form-control" id="dessert" name="dessert" style="border-radius:5px">
                                                @if($d->type == "Cookie")
                                                    <option value="Cookie" selected>Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Cake")
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake" selected>Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Chocolate")
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate" selected>Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @elseif($d->type == "Ice Cream")
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream" selected>Ice Cream</option>
                                                    <option value="Other">Other</option>
                                                @else
                                                    <option value="Cookie">Cookie</option>
                                                    <option value="Cake">Cake</option>
                                                    <option value="Chocolate">Chocolate</option>
                                                    <option value="Ice Cream">Ice Cream</option>
                                                    <option value="Other" selected>Other</option>
                                                @endif
                                            </select>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Country</label>
                                        <select class="form-control" id="exampleInputEmail1" name="country" style="border-radius:5px">
                                            @foreach($countries as $country)
                                                @if($country == $d->country)
                                                    <option value="{{$country}}" selected>{{$country}}</option>
                                                @else
                                                    <option value="{{$country}}">{{$country}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        @if($d->main_cat == "Food")
                                            <label for="exampleInputEmail1" id="labelSp">Spicyness</label>
                                            <select class="form-control" id="spi" name="spi" style="border-radius:5px">
                                                @if($d->spicyness == "Not Spicy")
                                                    <option value="Not Spicy" selected>Not Spicy</option>
                                                    <option value="Spicy">Spicy</option>
                                                    <option value="Super Spicy">Super Spicy</option>
                                                @elseif($d->spicyness == "Spicy")
                                                    <option value="Not Spicy">Not Spicy</option>
                                                    <option value="Spicy" selected>Spicy</option>
                                                    <option value="Super Spicy">Super Spicy</option>
                                                @else
                                                    <option value="Not Spicy">Not Spicy</option>
                                                    <option value="Spicy">Spicy</option>
                                                    <option value="Super Spicy" selected>Super Spicy</option>
                                                @endif
                                            </select>
                                            <label for="exampleInputEmail1" hidden id="labelS">Sweetness</label>
                                            <select class="form-control" id="swe" name="swe" style="border-radius:5px" hidden>
                                                @if($d->sweetness == "Normal")
                                                    <option value="Normal" selected>Normal</option>
                                                    <option value="Sweet">Sweet</option>
                                                    <option value="Super Sweet">Super Sweet</option>
                                                @elseif($d->sweetness == "Sweet")
                                                    <option value="Normal">Normal</option>
                                                    <option value="Sweet" selected>Sweet</option>
                                                    <option value="Super Sweet">Super Sweet</option>
                                                @else
                                                    <option value="Normal">Normal</option>
                                                    <option value="Sweet">Sweet</option>
                                                    <option value="Super Sweet" selected>Super Sweet</option>
                                                @endif
                                            </select>
                                        @else
                                            <label for="exampleInputEmail1" id="labelS">Sweetness</label>
                                            <select class="form-control" id="swe" name="swe" style="border-radius:5px">
                                                @if($d->sweetness == "Normal")
                                                    <option value="Normal" selected>Normal</option>
                                                    <option value="Sweet">Sweet</option>
                                                    <option value="Super Sweet">Super Sweet</option>
                                                @elseif($d->sweetness == "Sweet")
                                                    <option value="Normal">Normal</option>
                                                    <option value="Sweet" selected>Sweet</option>
                                                    <option value="Super Sweet">Super Sweet</option>
                                                @else
                                                    <option value="Normal">Normal</option>
                                                    <option value="Sweet">Sweet</option>
                                                    <option value="Super Sweet" selected>Super Sweet</option>
                                                @endif
                                            </select>
                                            <label for="exampleInputEmail1" hidden id="labelSp">Spicyness</label>
                                            <select class="form-control" id="spi" name="spi" style="border-radius:5px" hidden>
                                                @if($d->spicyness == "Not Spicy")
                                                    <option value="Not Spicy" selected>Not Spicy</option>
                                                    <option value="Spicy">Spicy</option>
                                                    <option value="Super Spicy">Super Spicy</option>
                                                @elseif($d->spicyness == "Spicy")
                                                    <option value="Not Spicy">Not Spicy</option>
                                                    <option value="Spicy" selected>Spicy</option>
                                                    <option value="Super Spicy">Super Spicy</option>
                                                @else
                                                    <option value="Not Spicy">Not Spicy</option>
                                                    <option value="Spicy">Spicy</option>
                                                    <option value="Super Spicy" selected>Super Spicy</option>
                                                @endif
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ease of Making</label>
                                        <select class="form-control" id="exampleInputEmail1" name="ease" tyle="border-radius:5px">
                                            @if($d->ease_of_making == "Easy")
                                                <option value="Easy" selected>Easy</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Hard">Hard</option>
                                            @elseif($d->ease_of_making == "Medium")
                                                <option value="Easy">Easy</option>
                                                <option value="Medium" selected>Medium</option>
                                                <option value="Hard">Hard</option>
                                            @else
                                                <option value="Easy">Easy</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Hard" selected>Hard</option>
                                            @endif
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ingredient</label>
                                        <textarea class="form-control" id="exampleInputEmail1" name="ing" cols="30" rows="5" style="border-radius:5px" required>{{$d->ingredient}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Recipe</label>
                                        <textarea class="form-control" id="exampleInputEmail1" name="rec" cols="30" rows="5" style="border-radius:5px" required>{{$d->recipe}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image for Cover</label>
                                        <input class="form-control" type="file" id="img1" name="img1" accept="image/*" onchange="preview(event,'img',0)">
                                        <img src="{{asset($d->cover)}}" width='100%' id='img' style="margin-top:20px;">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image for Gallery (Maximum 2 files)</label>
                                        <input class="form-control" type="file" id="img2" name="img2[]" style="border-radius:5px" multiple onchange="checkFiles(this.files, event, 'pre1','pre2')" accept="image/*">
                                        <div class="row" style="margin-top:20px;">
                                            <div class="col-lg-6">
                                                <img src="{{asset($d->gallery1)}}" width='100%' id='pre1'>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="{{asset($d->gallery2)}}" width='100%' id='pre2'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12  align-self-center">
                                <button type="submit" class="btn btn-danger" name="submit" style="width:150px;">ACCEPT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
    </div>
</div>
<br><br>

<script>
    function showInput()
    {
        var e = document.getElementById("main-cat");
        var strUser = e.options[e.selectedIndex].value;
        var x = document.getElementById("food");
        var y = document.getElementById("drink");
        var z = document.getElementById("dessert");

        var swe = document.getElementById("swe");
        var spi = document.getElementById("spi");
        var ls = document.getElementById("labelS");
        var lsp = document.getElementById("labelSp");
        
        if(strUser == "Food")
        {   
            x.hidden = false;
            y.hidden = true;
            z.hidden = true;

            ls.hidden = true;
            swe.hidden= true;
            lsp.hidden = false;
            spi.hidden = false; 
        }  
        else if(strUser == "Drink")
        {
            x.hidden = true;
            y.hidden = false;
            z.hidden = true;

            ls.hidden = false;
            swe.hidden= false;
            lsp.hidden = true;
            spi.hidden = true; 
        }  
        else
        {
            x.hidden = true;
            y.hidden = true;
            z.hidden = false;

            ls.hidden = false;
            swe.hidden= false;
            lsp.hidden = true;
            spi.hidden = true; 
        }
    } 

    function checkFiles(files, evt, id1, id2) {     

      if(files.length>2) {
        alert("You can only upload 2 files in Image for Gallery. If you choose more than 2 files, only the first 2 files will be uploaded.");
        // files.slice(0,2);
        // return false;
        }    
        preview(evt, id1, 0);
        preview(evt, id2, 1);   
    }

    function preview(evt, id, index)
    {
        var img=document.getElementById(id);
        img.src=URL.createObjectURL(evt.target.files[index])
    }
</script>
@endsection