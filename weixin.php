//app.js
App({
  onLaunch: function () {
    // 展示本地存储能力
    var logs = wx.getStorageSync('logs') || []
    logs.unshift(Date.now())
    wx.setStorageSync('logs', logs)
  },
  getUserInfo: function (cb) {
    var that = this
    if (this.globalData.userInfo) {
      typeof cb == "function" && cb(this.globalData.userInfo)
    } else {
      //调用登录接口
      wx.login({
        success: function () {
          wx.getUserInfo({
            success: function (res) {
              that.globalData.userInfo = res.userInfo
              typeof cb == "function" && cb(that.globalData.userInfo)
            }
          })
        }
      })
    }
  },
  globalData: {
    userInfo: null
  }
})


//logs.js
var app = getApp()
Page({
  data: {
    phone: '',
    password: '',
    userInfo: {}
  },
  onLoad: function () {
    var that = this
    //调用应用实例的方法获取全局数据
    app.getUserInfo(function (userInfo) {
      //更新数据
      that.setData({
        userInfo: userInfo
      })
    })
  }, 
  // 获取输入账号  
  phoneInput: function (e) {
    this.setData({
      phone: e.detail.value
    })
  },

  // 获取输入密码  
  passwordInput: function (e) {
    this.setData({
      password: e.detail.value
    })
  },

  // 登录  
  login: function () {
    if (this.data.phone.length == 0 || this.data.password.length == 0) {
      wx.showToast({
        title: '用户名和密码不能为空',
        icon: 'none',
        duration: 2000
      })
    } else if(this.data.phone=="admin"&&this.data.password=="admin") {
      // 这里修改成跳转的页面  
      wx.showToast({
        title: '登录成功',
        icon: 'success',
        duration: 2000,
        success:function(){
          wx.navigateTo({
            url: '../index/index'
          })
        }
      })
    }else{
      wx.showToast({
        title: '登录失败',
        icon: 'none',
        duration: 2000
      })
    }
  }
})  
<!--logs.wxml-->
  <view class='container '>
  <view  bindtap="bindViewTap" class="userinfo">
    <image class="userinfo-avatar" src="{{userInfo.avatarUrl}}" 
    background-size="cover"/>
  </view>
   <view class="login-from">  
   
    <!--账号-->  
    <view class="inputView">  

      <label class="loginLab">账号:</label>  
      <input class="inputText" placeholder="请输入账号" bindinput="phoneInput" />  
    </view>  
    <!--密码-->  
    <view class="inputView">  
      <label class="loginLab">密码:</label>  
      <input class="inputText" password="true" placeholder="请输入密码" 
      bindinput="passwordInput"/>  
    </view>  
  
    <!--按钮-->  
    <view class="loginBtnView">  
      <button class="loginBtn" type="primary" size="{{primarySize}}" loading="{{loading}}" 
       plain="{{plain}}" disabled="{{disabled}}"     bindtap="login">登录</button>  
    </view>  
  </view> 

   
  </view>
 

//logs.wxss
page{  
  height: 100%;  
}  
.container {  
  height: 100%;  
  display: flex;  
  flex-direction: column;  
  padding: 0;  
  box-sizing: border-box;  
  background-color: #fff  
} 
.userinfo {
  padding: 100rpx 0;
  align-items: center;
}  
.userinfo-avatar {
   width: 128rpx;
  height: 128rpx;
  margin: 20rpx;
  border-radius: 50%;
}
/*表单内容*/  
.login-from {  
  margin-top: 0rpx;  
  flex: auto;  
  height:100%;  
}  
  
.inputView {  
  background-color: #fff;  
  line-height: 44px;  
}  
/*输入框*/  
.nameImage, .keyImage {  
  margin-left: 10px;  
  width: 15px;  
  height: 15px  
}  
  
.loginLab {  
  margin: 15px 15px 15px 40px;  
  color: #545454;  
  font-size: 14px  
}  
.inputText {  
  flex: block;  
  float: right;  
  text-align: center;  
  margin-right: 100px;  
  margin-top: 11px;  
  color: #cccccc;  
  font-size: 14px  
}  
  
.line {  
  width: 100%;  
  height: 1px;  
  background-color: #cccccc;  
  margin-top: 1px;  
}  
/*按钮*/  
.loginBtnView {  
  width: 100%;  
  height: auto;  
  background-color: #fff;  
  margin-top: 0px;  
  margin-bottom: 0px;  
  padding-bottom: 0px;  
}  
  
.loginBtn {  
  width: 80%;  
  margin-top: 35px;  
}  