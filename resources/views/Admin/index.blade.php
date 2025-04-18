@extends("Admin.layouts.master");

@section("content")
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <h5 class="">درآمد</h5>
                    <ul class="tabs tab-pills">
                        <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">ماهانه</a></li>
                    </ul>
                </div>

                <div class="widget-content">
                    <div class="tabs tab-content">
                        <div id="content_1" class="tabcontent">
                            <div id="revenueMonthly"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-two">
                <div class="widget-heading">
                    <h5 class="">فروش بر اساس دسته بندی</h5>
                </div>
                <div class="widget-content">
                    <div id="chart-2" class=""></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget-two">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-content">
                            <span class="w-value">فروش روزانه</span>
                            <span class="w-numeric-title">برای جزئیات بیشتر به ستون ها بروید.</span>
                        </div>
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        </div>
                    </div>
                    <div class="w-chart">
                        <div id="daily-sales"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget-three">
                <div class="widget-heading">
                    <h5 class="">خلاصه</h5>
                </div>
                <div class="widget-content">

                    <div class="order-summary">

                        <div class="summary-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>درآمد</h6>
                                    <p class="summary-count">92600 تومان</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="summary-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>سود</h6>
                                    <p class="summary-count">37500 تومان</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="summary-list">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                            </div>
                            <div class="w-summary-details">

                                <div class="w-summary-info">
                                    <h6>هزینه ها</h6>
                                    <p class="summary-count">550000 تومان</p>
                                </div>

                                <div class="w-summary-stats">
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget-one">
                <div class="widget-content">
                    <div class="w-numeric-value">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        </div>
                        <div class="w-content">
                            <span class="w-value">3,192</span>
                            <span class="w-numeric-title">کل سفارشات</span>
                        </div>
                    </div>
                    <div class="w-chart">
                        <div id="total-orders"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-one">
                <div class="widget-heading">
                    <h5 class="">معاملات</h5>
                </div>

                <div class="widget-content">
                    <div class="transactions-list">
                        <div class="t-item">
                            <div class="t-company-name">
                                <div class="t-icon">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    </div>
                                </div>
                                <div class="t-name">
                                    <h4>قبض برق</h4>
                                    <p class="meta-date">4 خرداد 1:00بعد از ظهر</p>
                                </div>

                            </div>
                            <div class="t-rate rate-dec">
                                <p><span>-16000 تومان</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg></p>
                            </div>
                        </div>
                    </div>

                    <div class="transactions-list">
                        <div class="t-item">
                            <div class="t-company-name">
                                <div class="t-icon">
                                    <div class="avatar avatar-xl">
                                        <span class="avatar-title rounded-circle">SP</span>
                                    </div>
                                </div>
                                <div class="t-name">
                                    <h4>پارک شون</h4>
                                    <p class="meta-date">4 خرداد 1:00بعد از ظهر</p>
                                </div>
                            </div>
                            <div class="t-rate rate-inc">
                                <p><span>+66400 تومان</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg></p>
                            </div>
                        </div>
                    </div>

                    <div class="transactions-list">
                        <div class="t-item">
                            <div class="t-company-name">
                                <div class="t-icon">
                                    <div class="avatar avatar-xl">
                                        <span class="avatar-title rounded-circle">AD</span>
                                    </div>
                                </div>
                                <div class="t-name">
                                    <h4>امی دیاز</h4>
                                    <p class="meta-date">4 خرداد 1:00بعد از ظهر</p>
                                </div>

                            </div>
                            <div class="t-rate rate-inc">
                                <p><span>+64000 تومان</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg></p>
                            </div>
                        </div>
                    </div>

                    <div class="transactions-list">
                        <div class="t-item">
                            <div class="t-company-name">
                                <div class="t-icon">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    </div>
                                </div>
                                <div class="t-name">
                                    <h4>نتفلیکس</h4>
                                    <p class="meta-date">4 خرداد 1:00بعد از ظهر</p>
                                </div>
                            </div>
                            <div class="t-rate rate-dec">
                                <p><span>- تومان 32.00</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

            <div class="widget widget-activity-four">

                <div class="widget-heading">
                    <h5 class="">فعالیت های اخیر</h5>
                </div>

                <div class="widget-content">

                    <div class="mt-container mx-auto">
                        <div class="timeline-line">

                            <div class="item-timeline timeline-primary">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p><span>بروزرسانی</span> گزارشات سرور</p>
                                    <span class="badge badge-danger">در انتظار</span>
                                    <p class="t-time">همین الان</p>
                                </div>
                            </div>

                            <div class="item-timeline timeline-success">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>ارسال نامه به <a href="javascript:void(0);">HR</a> و <a href="javascript:void(0);">ادمین</a></p>
                                    <span class="badge badge-success">تکمیل شد</span>
                                    <p class="t-time">2 دقیقه پیش</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-danger">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>پشتیبان گیری <span>فایل EOD</span></p>
                                    <span class="badge badge-danger">در انتظار</span>
                                    <p class="t-time">14:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-dark">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>جمع آوری اسناد از <a href="javascript:void(0);">سارا</a></p>
                                    <span class="badge badge-success">تکمیل شد</span>
                                    <p class="t-time">16:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-warning">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>تماس کنفرانسی با <a href="javascript:void(0);">مدیر بازاریابی</a>.</p>
                                    <span class="badge badge-primary">در حال پیش رفت</span>
                                    <p class="t-time">17:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-secondary">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>راه اندازی مجدد سرور</p>
                                    <span class="badge badge-success">تکمیل شده</span>
                                    <p class="t-time">17:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-warning">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>جزئیات قرارداد را به فریلنسر ارسال کنید</p>
                                    <span class="badge badge-danger">در انتظار</span>
                                    <p class="t-time">18:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-dark">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>مهدی می خواهد زمان پروژه را افزایش دهد.</p>
                                    <span class="badge badge-primary">در حال پیش رفت</span>
                                    <p class="t-time">19:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-success">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>سرور برای حفظ و نگهداری</p>
                                    <span class="badge badge-success">تکمیل شده</span>
                                    <p class="t-time">19:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-secondary">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>پیوند مخرب شناسایی شد</p>
                                    <span class="badge badge-warning">مسدود شده</span>
                                    <p class="t-time">20:00</p>
                                </div>
                            </div>

                            <div class="item-timeline  timeline-warning">
                                <div class="t-dot" data-original-title="" title="">
                                </div>
                                <div class="t-text">
                                    <p>راه اندازی مجدد سرور</p>
                                    <span class="badge badge-success">تکمیل شده</span>
                                    <p class="t-time">23:00</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tm-action-btn">
                        <button class="btn">مشاهده همه <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">

            <div class="widget widget-account-invoice-one">

                <div class="widget-heading">
                    <h5 class="">اطلاعات حساب</h5>
                </div>

                <div class="widget-content">
                    <div class="invoice-box">

                        <div class="acc-total-info">
                            <h5>تعادل</h5>
                            <p class="acc-amount">470000 تومان</p>
                        </div>

                        <div class="inv-detail">
                            <div class="info-detail-1">
                                <p>پلن ماهیانه</p>
                                <p>199000 تومان</p>
                            </div>
                            <div class="info-detail-2">
                                <p>مالیات</p>
                                <p>17000 تومان</p>
                            </div>
                            <div class="info-detail-3 info-sub">
                                <div class="info-detail">
                                    <p>اضافی در این ماه</p>
                                    <p>-2500 تومان</p>
                                </div>
                                <div class="info-detail-sub">
                                    <p>اشتراک سالانه Netflix</p>
                                    <p>0 تومان</p>
                                </div>
                                <div class="info-detail-sub">
                                    <p>دیگر</p>
                                    <p>-3000 تومان</p>
                                </div>
                            </div>
                        </div>

                        <div class="inv-action">
                            <a href="" class="btn btn-outline-dark">خلاصه</a>
                            <a href="" class="btn btn-danger">انتقال</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">سفارشات اخیر</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><div class="th-content">مشتری</div></th>
                                    <th><div class="th-content">محصول</div></th>
                                    <th><div class="th-content">صورتحساب</div></th>
                                    <th><div class="th-content th-heading">قیمت</div></th>
                                    <th><div class="th-content">وضعیت</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">اندی کینگ</div></td>
                                    <td><div class="td-content product-brand">نایک اسپرت</div></td>
                                    <td><div class="td-content">#76894</div></td>
                                    <td><div class="td-content pricing"><span class="">88000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="badge outline-badge-primary">حمل شده</span></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">ایرین کالینز</div></td>
                                    <td><div class="td-content product-brand">بلندگو</div></td>
                                    <td><div class="td-content">#75844</div></td>
                                    <td><div class="td-content pricing"><span class="">840000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="badge outline-badge-success">پرداخت شده</span></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">لوری فاکس</div></td>
                                    <td><div class="td-content product-brand">دوربین</div></td>
                                    <td><div class="td-content">#66894</div></td>
                                    <td><div class="td-content pricing"><span class="">1260000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="badge outline-badge-danger">در انتظار</span></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">لوک عاج</div></td>
                                    <td><div class="td-content product-brand">هدفون</div></td>
                                    <td><div class="td-content">#46894</div></td>
                                    <td><div class="td-content pricing"><span class="">560000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="badge outline-badge-success">پرداخت شده</span></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">رایان کالینز</div></td>
                                    <td><div class="td-content product-brand">ورزش</div></td>
                                    <td><div class="td-content">#89891</div></td>
                                    <td><div class="td-content pricing"><span class="">108000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="badge outline-badge-primary">حمل شده</span></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">نیا هیلیر</div></td>
                                    <td><div class="td-content product-brand">عینک</div></td>
                                    <td><div class="td-content">#26974</div></td>
                                    <td><div class="td-content pricing"><span class="">1680000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="badge outline-badge-primary">حمل شده</span></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">سونیا شاو</div></td>
                                    <td><div class="td-content product-brand">ساعت</div></td>
                                    <td><div class="td-content">#76844</div></td>
                                    <td><div class="td-content pricing"><span class="">110000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="badge outline-badge-success">پرداخت شده</span></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-three">

                <div class="widget-heading">
                    <h5 class=""> محصول برتر فروش</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><div class="th-content">محصول</div></th>
                                    <th><div class="th-content th-heading">قیمت</div></th>
                                    <th><div class="th-content th-heading">تخفیف</div></th>
                                    <th><div class="th-content">فروخته شده</div></th>
                                    <th><div class="th-content">منبع</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">بلندگو</div></td>
                                    <td><div class="td-content"><span class="pricing">860000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="discount-pricing">10000 تومان</span></div></td>
                                    <td><div class="td-content">240</div></td>
                                    <td><div class="td-content"><a href="javascript:void(0);" class="">مستقیم</a></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">عینک</div></td>
                                    <td><div class="td-content"><span class="pricing">560000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="discount-pricing">50000 تومان</span></div></td>
                                    <td><div class="td-content">190</div></td>
                                    <td><div class="td-content"><a href="javascript:void(0);" class="">گوگل</a></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">ساعت</div></td>
                                    <td><div class="td-content"><span class="pricing">88000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="discount-pricing">20000 تومان</span></div></td>
                                    <td><div class="td-content">66</div></td>
                                    <td><div class="td-content"><a href="javascript:void(0);" class="">تبلیغات</a></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">لپتاپ</div></td>
                                    <td><div class="td-content"><span class="pricing">110000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="discount-pricing">56000 تومان</span></div></td>
                                    <td><div class="td-content">35</div></td>
                                    <td><div class="td-content"><a href="javascript:void(0);" class="">ایمیل</a></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">دوربین</div></td>
                                    <td><div class="td-content"><span class="pricing">2500000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="discount-pricing">120000 تومان</span></div></td>
                                    <td><div class="td-content">30</div></td>
                                    <td><div class="td-content"><a href="javascript:void(0);" class="">معرف</a></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">کفش</div></td>
                                    <td><div class="td-content"><span class="pricing">1180000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="discount-pricing">460000 تومان</span></div></td>
                                    <td><div class="td-content">130</div></td>
                                    <td><div class="td-content"><a href="javascript:void(0);" class="">گوگل</a></div></td>
                                </tr>
                                <tr>
                                    <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">هدفون</div></td>
                                    <td><div class="td-content"><span class="pricing">1680000 تومان</span></div></td>
                                    <td><div class="td-content"><span class="discount-pricing">560000 تومان</span></div></td>
                                    <td><div class="td-content">170</div></td>
                                    <td><div class="td-content"><a href="javascript:void(0);" class="">Ads</a></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
