# **BÁO CÁO LỖ HỔNG**
Tên dự án: Lab CRUD php

URL: https://crudduchpt.000webhostapp.com/ 

Hình thức test: Black box

TTS: Đỗ Trung Đức

# :computer: CRUD-web-app
Đây là một ứng dụng web CRUD (Tạo, Đọc, Cập nhật và Xóa) đơn giản được phát triển bằng PHP, HTML và MySQL.

Với hệ thống, người dùng có thể thêm, sửa và xóa hồ sơ học sinh.

## 🏁 RECON – do thám đối tượng trước khi tấn công 
🧰 Công cụ RECON:

                 *`BURP SUITE`
                 
                 *`DIRSEARCH`
                 
                 *`NSLOOKUP`
                 
                 *`NMAP`

![image](https://user-images.githubusercontent.com/75435676/193860943-c94a812b-a14b-46d9-a59c-f5d2a85cc905.png)

![image](https://user-images.githubusercontent.com/75435676/193861032-6bca912c-b1de-4590-b1db-78ba0244aad3.png)

![image](https://user-images.githubusercontent.com/75435676/193861085-3c033b89-3220-4cd3-a732-fd091914e32e.png)

![image](https://user-images.githubusercontent.com/75435676/193861101-78a71f28-cf01-40d0-9142-dfd8c6f9ea5b.png)

![image](https://user-images.githubusercontent.com/75435676/193861128-33cdb474-e772-48cc-b24f-e82ba4ec4d19.png)

![image](https://user-images.githubusercontent.com/75435676/193862598-66497f66-976e-4b93-ba2a-69de9d7d661a.png)

Sau quá trình Recon ta thu được nhưng thông tin sau:

	Ngôn ngữ: PHP
  
	Chức năng: CRUD
  
	Sever: awex
  
	IP: 172.29.112.1
  
	Endpoints: /config/; /controller
  
	MySQL: version 5.0.4
  
 # Bắt đầu test
 
 ## Testcase: BROKEN ACCESS CONTROL
 
**Khái niệm:** Truy cập những thông tin nhạy cảm của trang web không được được xuất hiện ở phía người dùng. Dẫn đến logic xử lý của website có thể bị lợi dụng sau này  nếu phát triển lớn hơn.

![image](https://user-images.githubusercontent.com/75435676/193863406-28ae8bd8-97a4-49ca-9a6c-803a9eb5b7ac.png)

![image](https://user-images.githubusercontent.com/75435676/193863424-ecbe9076-4dd8-42b7-8d59-af2d28ef3e0e.png)

Sau quá trình quét endpoints thì phát hiện được 2 thư mục khá thú vị là ‘Config’ và ‘Controller’.

![image](https://user-images.githubusercontent.com/75435676/193863467-4a566422-6274-4bb3-ab76-047cfbdc07cf.png)

![image](https://user-images.githubusercontent.com/75435676/193863507-1705e7a2-5280-45f1-aa4b-9401ee68a789.png)

Config thường là tệp cấu hình của website khi truy cập được thì ta có thể xem được cách Website vận hành từ đó ta sẽ có hướng khai thác nhanh hơn. Ở đây thì ta đã thu được data của website và tệp cấu hình. Và đồng thời ta cũng đã có sql của website nên hướng khai thác có thể sẽ nhanh hơn

![image](https://user-images.githubusercontent.com/75435676/193863584-0fa0e9b1-6bc1-4d96-a1a0-0c9c795c11ed.png)

![image](https://user-images.githubusercontent.com/75435676/193863606-98104134-4d59-4f1d-8f84-49e20fa45144.png)

Controller ở đây là nơi xử lý mọi hoạt động trên website. Ở đây ta có thể thấy được nó có 3 hoạt động chính là ‘edit’, ‘input’, ‘remove’ và đồng thời cũng biết được rằng website này được thiết kế dựa trên mô hình MVC (Model – View – Controller).

`*Tài liệu liên quan:**`

https://owasp.org/Top10/A01_2021-Broken_Access_Control/

Khuyến nghị: Kỹ lưỡng trong việc vận hành, phân quyền (Devops). Loại bỏ những dữ liệu nội bộ khi Deploy lên public sever (READme.md, git commit, .git…).

### **Case name: Cookie**

**Khái niệm:** Cookie được hiểu đơn giản là mã định danh để hệ thống hiểu người đang tương tác với hệ thống là ai. Nhưng lỗi ở đây là mã định danh ko có bất kỳ hay ràng buộc liên quan đến người tương tác với hệ thống nên nó gần như không có tác dụng gì ở trong đây.

![image](https://user-images.githubusercontent.com/75435676/193864961-ff4985cd-f30f-4491-a341-f6ca9bfde56b.png)

`*Tài liệu liên quan:**`

https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/03-Identity_Management_Testing/README

`**Khuyến nghị:**`Nên có ràng buộc rõ ràng với cookie với tài khoản người dùng mỗi khi đăng ký/đăng nhập (Phiên – thời gian – mã hõa – HTTP only …)

https://whitehat.vn/threads/web12-http-cookie-va-mot-so-van-de-bao-mat-phan-1.1948/ 

![image](https://user-images.githubusercontent.com/75435676/193865331-73625af2-9f2b-451d-a737-55d7119c8d39.png)

## Testcase: INPUT VALIDATION TESTING

**Khái niệm:** Input là nơi nhận đầu vào dữ liệu của người dùng và có thể sẽ trở thành mối nguy hiểm tiềm tàng nếu không quản lý dữ liệu người dùng nhập vào như dữ liệu dưới. Tên tài khoản và mật khẩu người dùng nhận vào không đi qua bất kỳ bộ lọc hay xử lý nào.

![image](https://user-images.githubusercontent.com/75435676/193865533-f6725159-1c98-4271-ab57-8f3d49d946f4.png)

`*Tài liệu liên quan:**`

https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/07-Input_Validation_Testing/README 

`**Khuyến nghị:**`Nên dùng filter lọc dữ liệu đầu vào loại bỏ các ký tự đặc biệt ( * / ; # …)

### Case name: STORE XSS 

**Chức năng:** Thêm mới – Xóa - Chỉnh sửa

https://crudduchpt.000webhostapp.com/student/?message=deleted 

https://crudduchpt.000webhostapp.com/student/input/index.php 

https://crudduchpt.000webhostapp.com/student/edit/?id=13&message=success

**Khái niệm:** XSS là dạng mã độc chèn những thẻ tag (html, script, img…) khiến nội dung người dùng nhập vào và hệ thống bị hiểu nhầm sẽ thực thi câu lệnh độc hại. Từ đó kẻ tấn công có thể lấy cắp các dữ liệu liên quan (cookie, session…) để có thể khai thác thêm.

![image](https://user-images.githubusercontent.com/75435676/193866627-08e5dd77-883c-4777-8b8d-5e04542bdf39.png)

![image](https://user-images.githubusercontent.com/75435676/193866665-d78cb6e3-8275-473d-8e27-23b0cf778772.png)

Sau khi thêm tag`<h1>`ta thu được kết quả như trên line 11 thế là ta có thể khai thác lỗi XSS được.
  
![image](https://user-images.githubusercontent.com/75435676/193866735-271b6e8e-654d-4072-9d2c-c04ffb22b831.png)

Thế ta thử 1 đoạn script đơn giản như trên nhưng bất ngờ là hệ thống hình như có bộ lọc nên đã ngăn chặn thực thi script. Thẻ`<h1>`thì thực thi được sẽ thế nào nếu ta đặt thẻ script ở bên trong.`(Payload: <h1><script>alert(document.cookie)</script></h1>)`
  
![image](https://user-images.githubusercontent.com/75435676/193866895-f0756a34-bb7d-40ea-8411-68bdf749daab.png)

![image](https://user-images.githubusercontent.com/75435676/193866919-f9ed5834-4e9d-4a86-9d43-e65a1b4a2538.png)

  
Và đoạn script đã được thực thi và gửi cookie về cho ta.

![image](https://user-images.githubusercontent.com/75435676/193867436-3b3e254f-d731-460b-8406-1920554f1128.png)

Khác với Chức năng thêm mới có bộ lọc thẻ script thì ở chức năng chỉnh sửa thẻ tag`<script>`được lưu trữ và thực thi khi nó được gọi đến.

`**Tài liệu liên quan:** `

https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/07-Input_Validation_Testing/README

https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/07-Input_Validation_Testing/02-Testing_for_Stored_Cross_Site_Scripting 

`**Khuyến nghị:**`Nên dùng filter lọc dữ liệu đầu vào loại bỏ các ký tự đặc biệt ( * / ; # …), chặn các thẻ tag và nên mã hóa trước khi lưu vào CSDL.

https://fptcloud.com/xss/

https://viblo.asia/p/ky-thuat-tan-cong-xss-va-cach-ngan-chan-YWOZr0Py5Q0

## Testcase: TESTING FOR WEAK CRYPTOGRAPHY

### Case name: Password

**Khái niệm:** Password là chuỗi những ký tự mà người dùng có thể tùy chỉnh để có thể nhớ dễ dàng và vid lý do đôi khi quá dễ dàng nên sẽ phát sinh ra lỗ hổng. Như vi dụ dưới đây mật khẩu có thể dễ dàng đoán ra nếu dùng brup force (quét cạn).

![image](https://user-images.githubusercontent.com/75435676/193868025-edb66ddd-2d3c-4d5a-b454-b47f9157d42f.png)

`**Tài liệu liên quan:** `

https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/09-Testing_for_Weak_Cryptography/README 

https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/09-Testing_for_Weak_Cryptography/04-Testing_for_Weak_Encryption 

`Khuyến nghị:`
          * `Phía chính sách người dùng:` Mật khẩu phải có độ dài tiêu chuẩn nhất định, bao gồm chữ hoa, thường và cả ký tự đặc biệt.
          * `Phía nhà phát triển:` Mật khẩu người dùng không được lưu trực tiếp vào cơ sở dữ liệu mà phải thông qua các thuật toán mã hóa (MD5, AEH, DES, SHA …)
          
## Testcase: AUTHENTICATION TESTING

### Case name: Testing for Weak Lock Out Mechanism

**Khái niêm:** Đây là cơ chế chính sách bảo vệ không hẳn là lỗi bảo mật. Dựa vào lỗ hổng không bị giới hạn số lần nhập sai kẻ tấn công có thể sử dụng kỹ thuật burp force (quét cạn) để dò được mật khẩu nạn nhân. Ví dụ dưới đây là lỗ hổng không có cơ chế khóa khi tài khoản nhập sai quá nhiều lần.

![image](https://user-images.githubusercontent.com/75435676/193869931-926707bb-73ea-4205-89dc-0b798ce654bc.png)


![image](https://user-images.githubusercontent.com/75435676/193869956-bbff5ca8-c7a1-4390-9cd0-b32aa9808b9c.png)

`**Tài liệu liên quan:** `

https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/04-Authentication_Testing/README 

https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/04-Authentication_Testing/03-Testing_for_Weak_Lock_Out_Mechanism

`**Khuyến nghị:**` Tài khoản người dùng nên bị khóa sau 3-5 lần thử nếu vì đặc thù không thể khóa thì sẽ giới hạn thời gian lần thử theo thứ tự tăng dần (30s, 60s, 90s, …) hoặc sử dụng Capcha. Để có thể bảo mật hơn ta có thể sử dụng bảo mật 2 lớp (sms, gmail …)
          
http://m.antoanthongtin.gov.vn/giai-phap-khac/giai-phap-va-ung-dung-cong-nghe-bao-mat-hai-lop-trong-windows-logon-107773#:~:text=B%E1%BA%A3o%20m%E1%BA%ADt%20hai%20l%E1%BB%9Bp%20(Two,c%C3%A1c%20cu%E1%BB%99c%20t%E1%BA%A5n%20c%C3%B4ng%20m%E1%BA%A1ng. 
    
