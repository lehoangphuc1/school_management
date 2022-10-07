@extends('admin.admin_master')
@section('content')
<div class="container">
    <div class="cover-photo">
      <img src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" class="profile">
    </div>
    <div class="profile-name">Người dùng: {{ $user->name }}</div>
      <p class="about">Giới tính: {{ $user->gender }}</p> 
      <p class="about">Loại tài khoản: {{ $user->usertype }}</p> 
      <p class="about">Địa chỉ email: {{ $user->email }}</p> 
      <p class="about">Số điện thoại: {{ $user->phone }}</p>
    <p class="about">Địa chỉ: {{ $user->address }}</p> 
    <a href="{{ route('profile.edit') }}" class="msg-btn">Sửa Profile</a>
    <a href="" class="follow-btn">Following</a>
    <div style="margin-top: 15px">
      <i class="fab fa-facebook-f"></i>
      <i class="fab fa-instagram"></i>
      <i class="fab fa-youtube"></i>
      <i class="fab fa-twitter"></i>
    </div>
  </div>
<style>
 
 .container{
  user-select: none;
  margin: 100px auto;
  background: #231e39;
  color: #b3b8cd;
  border-radius: 5px;
  width: 750px;
  text-align: center;
  box-shadow: 0 10px 20px -10px rgba(0,0,0,.75);
}
.cover-photo{
  background: url(https://images.unsplash.com/photo-1540228232483-1b64a7024923?ixlib=rb-1.2.1&auto=format&fit=crop&w=967&q=80);
  height: 160px;
  width: 100%;
  border-radius: 5px 5px 0 0;
}
.profile{
  height: 120px;
  width: 120px;
  border-radius: 50%;
  margin: 93px 0 0 -175px;
  border: 1px solid #1f1a32;
  padding: 7px;
  background: #292343;
}
.profile-name{
  font-size: 25px;
  font-weight: bold;
  margin: 27px 0 0 120px;
}
.about{
  margin-top: 35px;
  line-height: 21px;
}
button{
  margin: 10px 0 40px 0;
}
.msg-btn, .follow-btn{
  background: #03bfbc;
  border: 1px solid #03bfbc;
  padding: 10px 25px;
  color: #231e39;
  border-radius: 3px;
  font-family: Montserrat, sans-serif;
  cursor: pointer;
}
.follow-btn{
  margin-left: 10px;
  background: transparent;
  color: #02899c;
}
.follow-btn:hover{
  color: #231e39;
  background: #03bfbc;
  transition: .5s;
}
.container i{
  padding-left: 20px;
  font-size: 20px;
  margin-bottom: 20px;
  cursor: pointer;
  transition: .5s;
}
.container i:hover{
  color: #03bfbc;
}
</style>
 @endsection