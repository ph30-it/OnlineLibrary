 <div class="header"> 
                <h1 class="page-header">
                    Your cart
                </h1>                       
            </div> 

            <div id="page-inner" class="container">
                <div class="order-cart-container">
                    <div class="row" style="display: flex;justify-content: center;align-items: center">
                        <div class="col-xs-11">
                            <div class="order-cart-container">
                                <div class="cart-status-name-bar">
                                    <div class="cart-status-name">
                                        Xác nhận thuê sách
                                    </div>
                                </div>

                                <div class="ordered-book-list" id="ordered-book-list">
                                    @if(isset($data['ordered_data']))
                                    @foreach($data['ordered_data'] as $order)
                                    <div class="ordered-book-container">
                                        <div class="row">
                                            <div class="col-xs-3" style="display: flex;justify-content: center;align-items: center;height: 200px">
                                              <!-- book cover-->  
                                              <img src="{{$order->book->img}}" class="book-cover">
                                            </div>
                                            <div class="col-xs-9">
                                                <div class="book-name">
                                                    {{$order->book->name}}
                                                </div>
                                                <br>
                                                <div class="book-detail-1">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-author">
                                                                Author: {{$order->book->author}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-published-year">
                                                                Published year: {{$order->book->published_year}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="book-price">
                                            {{number_format($order->book->price)}} VND
                                        </div>

                                        <div class="remove-cart" data-order-id="{{$order->id}}">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <button id="confirm-ordered-books">Confirm</button>
                            </div>

                            <hr>
                            
                            <div class="approval-cart-container">
                                <div class="cart-status-name-bar" style="background-color: #e67e22">
                                    <div class="cart-status-name">
                                        Đang duyệt
                                    </div>
                                </div>

                                <div class="ordered-book-list">
                                    @if(isset($data['approval_data']))
                                    @foreach($data['approval_data'] as $order)
                                    <div class="ordered-book-container">
                                        <div class="row">
                                            <div class="col-xs-3" style="display: flex;justify-content: center;align-items: center;height: 200px">
                                              <!-- book cover-->  
                                              <img src="{{$order->book->img}}" class="book-cover">
                                            </div>
                                            <div class="col-xs-9">
                                                <div class="book-name">
                                                    {{$order->book->name}}
                                                </div>
                                                <br>
                                                <div class="book-detail-1">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-author">
                                                                Author: {{$order->book->author}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-published-year">
                                                                Published year: {{$order->book->published_year}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="book-price">
                                            {{number_format($order->book->price)}} VND
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="approved-cart-container">
                                <div class="cart-status-name-bar" style="background-color: #2ecc71">
                                    <div class="cart-status-name">
                                        Đã duyệt
                                    </div>
                                </div>

                                <div class="ordered-book-list">
                                    @if(isset($data['approved_data']))
                                    @foreach($data['approved_data'] as $order)
                                    <div class="ordered-book-container">
                                        <div class="row">
                                            <div class="col-xs-3" style="display: flex;justify-content: center;align-items: center;height: 200px">
                                              <!-- book cover-->  
                                              <img src="{{$order->book->img}}" class="book-cover">
                                            </div>
                                            <div class="col-xs-9">
                                                <div class="book-name">
                                                    {{$order->book->name}}
                                                </div>
                                                <br>
                                                <div class="book-detail-1">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-author">
                                                                Author: {{$order->book->author}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-published-year">
                                                                Published year: {{$order->book->published_year}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="book-detail-1">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-author">
                                                                Date borrow: {{$order->book->date_borrow}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-published-year">
                                                                Date give back: {{$order->book->date_give_back}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="book-price">
                                            {{number_format($order->book->price)}} VND
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                            <hr>

                            <div class="denied-cart-container">
                                <div class="cart-status-name-bar" style="background-color: #e74c3c">
                                    <div class="cart-status-name">
                                        Bị từ chối
                                    </div>
                                </div>

                                <div class="ordered-book-list">
                                    @if(isset($data['approved_data']))
                                    @foreach($data['approved_data'] as $order)
                                    <div class="ordered-book-container">
                                        <div class="row">
                                            <div class="col-xs-3" style="display: flex;justify-content: center;align-items: center;height: 200px">
                                              <!-- book cover-->  
                                              <img src="{{$order->book->img}}" class="book-cover">
                                            </div>
                                            <div class="col-xs-9">
                                                <div class="book-name">
                                                    {{$order->book->name}}
                                                </div>
                                                <br>
                                                <div class="book-detail-1">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-author">
                                                                Author: {{$order->book->author}}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="book-published-year">
                                                                Published year: {{$order->book->published_year}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="book-price">
                                            {{number_format($order->book->price)}} VND
                                        </div>

                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->