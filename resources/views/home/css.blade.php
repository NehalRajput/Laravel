<!-- Basic -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>UniqueFashion</title>

<!-- Bootstrap core CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f5f5;
    }

    /* Header Styles */
    .header_section {
        background-color: #ffffff;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .header_section.header-scrolled {
        background-color: rgba(255, 255, 255, 0.95);
    }

    .navbar-brand .logo-text {
        font-size: 28px;
        font-weight: 700;
        color: #2c3e50;
    }

    .navbar-brand .highlight {
        color: #e74c3c;
    }

    .nav-link {
        font-weight: 500;
        color: #2c3e50 !important;
        padding: 15px 20px !important;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #e74c3c !important;
    }

    /* Product Section */
    .product-section {
        padding: 100px 0 60px 0;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .card-img-top {
        height: 300px;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
    }

    .price-tag {
        font-size: 20px;
        color: #27ae60;
        font-weight: 600;
    }

    .discount-price {
        color: #e74c3c;
        text-decoration: line-through;
        margin-right: 10px;
        font-size: 16px;
    }

    .btn-primary {
        background-color: #e74c3c;
        border: none;
        padding: 10px 25px;
        border-radius: 25px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #c0392b;
        transform: scale(1.05);
    }

    /* Footer */
    .footer {
        background-color: #2c3e50;
        color: #ffffff;
        padding: 60px 0 30px;
        margin-top: 60px;
    }

    .footer h5 {
        color: #ffffff;
        font-weight: 600;
        margin-bottom: 25px;
    }

    .footer ul {
        list-style: none;
        padding: 0;
    }

    .footer ul li {
        margin-bottom: 15px;
    }

    .footer ul li a {
        color: #ecf0f1;
        transition: all 0.3s ease;
    }

    .footer ul li a:hover {
        color: #e74c3c;
        text-decoration: none;
        padding-left: 5px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .navbar-brand .logo-text {
            font-size: 24px;
        }

        .nav-link {
            padding: 10px 15px !important;
        }

        .card-img-top {
            height: 250px;
        }
    }
</style>