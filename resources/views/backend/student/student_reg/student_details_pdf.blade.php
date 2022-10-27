<style>
    .styled-table {
    border-collapse: collapse;
    margin: 0 auto;
    font-size: 0.9em;
    font-family: DejaVu Sans, sans-serif;
    min-width: 600px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
body {
    font-family: DejaVu Sans, sans-serif;
 }
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
    text-align: left;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
</style>
<head>
    <meta charshet="utf-8" />
</head>
<table class="styled-table">
    <tr>
        <td>THCS Lương Thế Vinh</td>
        <td>
            <h2>Hệ Thống Quản Lý Học Sinh</h2>
            <p>Địa Chỉ: 123 Nguyễn Huy Trứ</p>
            <p>Điện Thoại: 0123456789</p>
            <p>Email: hotro@gmail.com</p>
        </td>
    </tr>
</table>
<table class="styled-table">
    <thead>
        <tr>
            <th width="10%">Sl</th>
            <th width="45%">Chi tiết học sinh</th>
            <th width="45%">Dữ liệu học sinh</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Tên học sinh</td>
            <td>{{ $details['student']['name'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Mã ID</td>
            <td>{{ $details['student']['id_no'] }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Ngày sinh</td>
            <td>{{ $details['student']['birthday'] }}</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Giới tính</td>
            <td>{{ $details['student']['gender'] }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Email</td>
            <td>{{ $details['student']['email'] }}</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Điện thoại</td>
            <td>{{ $details['student']['phone'] }}</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Địa chỉ</td>
            <td>{{ $details['student']['address'] }}</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Lớp</td>
            <td>{{ $details['student_class']['name'] }}</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Năm học</td>
            <td>{{ $details['student_year']['name'] }}</td>
        </tr>
        <tr>
            <td>10</td>
            <td>Group</td>
            <td>{{ $details['group']['name'] }}</td>
        </tr>
        <tr>
            <td>11</td>
            <td>Buổi học</td>
            <td>{{ $details['shift']['name'] }}</td>
        </tr>
    </tbody>
</table>
<br><br>
<i style="font-size:10px; float:left;margin-left:60px">Print Date: {{ date("d M Y") }}</i>