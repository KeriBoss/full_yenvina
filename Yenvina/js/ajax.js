//QUantity


// Create our number formatter.
const formatter = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',

    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
});

const divTotalPrice = document.querySelector('.desc-right .costs b')

let userId_table = document.querySelector('.modal-body table').dataset.user;
const btnAddCart = document.querySelectorAll('.add-cart a');
$(document).ready(function () {
    btnAddCart.forEach(item => {
        item.onclick = (e) => {
            e.preventDefault();
            let id = item.dataset.parent;
            let user_id = item.dataset.user;
            $.ajax({
                url: 'add_product_cart.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    product_id: id,
                    user_id: user_id
                }
            }).done(function (reponse) {
                showContentCart(reponse);
            });
        }
    });
})
//QUantity

function btnLowest(product_id, quantity) {
    let preQuan = quantity - 1;
    if (preQuan >= 1) {
        $.ajax({
            url: 'add_product_cart.php',
            type: 'GET',
            dataType: 'json',
            data: {
                product_id: product_id,
                user_id: userId_table,
                quantity: preQuan
            }
        }).done(function (reponse) {
            console.log(reponse);
            showContentCart(reponse);
        })
    }

}
function btnHighest(product_id, quantity) {
    let nextQuan = (quantity * 1) + 1;
    $.ajax({
        url: 'add_product_cart.php',
        type: 'GET',
        dataType: 'json',
        data: {
            product_id: product_id,
            user_id: userId_table,
            quantity: nextQuan
        }
    }).done(function (reponse) {
        showContentCart(reponse);
    })
}
//Remove item product in cart
function removeProduct(product_id){
    $.ajax({
        url: 'remove_product_cart.php',
        type: 'GET',
        dataType: 'json',
        data: {
            product_id: product_id,
            user_id: userId_table
        }
    }).done(function (reponse) {
        showContentCart(reponse);
    })
}
//Show conent on modal cart
function showContentCart(reponse) {
    const modalCart = document.getElementById('popupAddCart');
    const modalHeader = modalCart.querySelector('.modal-header');
    const modalContent = modalCart.querySelector('.modal-body table tbody');
    const modalFooter = modalCart.querySelector('.modal-footer');

    const totalProductDiv = document.querySelector('.create-cart');

    let totalPrice = 0;

    let totalQuantity = 0;

    modalContent.innerHTML = '';
    reponse.forEach(item => {
        totalPrice += (item.prices - ((item.prices * item.sale) / 100)) * item.quantity;
        totalQuantity += item.quantity;
        modalContent.innerHTML += `
                    <tr>
                        <th class="mb-shown" scope="row">1</th>
                        <td>
                            <img width="70" height="70" src="./img/product/${item.thumbnail}" alt="${item.thumbnail}">
                        </td>
                        <td class="mb-shown-sm">
                            <p><b class="bold">To yen tinh che Vip loai 1</b></p>
                            <p>Phien ban: ${item.weight}</p>
                            <p>${item.type_name}</p>
                        </td>
                        <td>
                            <p><b class="bold">${formatter.format(item.prices - ((item.prices * item.sale) / 100))}</b></p>
                            <p><span class="price-old">${item.prices}d</span></p>
                            <p><span class="sale">-${item.sale}%</span></p>
                        </td>
                        <td>
                            <div class="range">
                                <input onclick="btnLowest(${item.product_id},${item.quantity})" type="button" class="lowest_quan" value="-" />
                                <input id="cart_quantity" type="text" class="main_quan" name="quantity" value="${item.quantity}" />
                                <input onclick="btnHighest(${item.product_id},${item.quantity})" type="button" class="highest_quan" value="+" />
                            </div>
                        </td>
                        <td><b class="bold">${formatter.format((item.prices - ((item.prices * item.sale) / 100)) * item.quantity)}</b></td>
                        ${modalContent.dataset.page == 'true' ? `<td><a style="cursor: pointer;" onclick='removeProduct(${item.product_id})' class='remove'><i class='bx bx-x'></i></a></td>` : ''}
                        </tr>
                    `;
        modalHeader.innerHTML = `
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">
                            Giỏ hàng hiện có ( <span>${totalQuantity}</span> ) sản phẩm
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    `;
    })
    modalFooter.innerHTML = `
                    <div class="price-final float-left"><span>${formatter.format(totalPrice)}</span></div>
                    <div class="group">
                        <a href="./cart.php" class="btn-tablink">Giỏ hàng</a>
                        <a href="./payment.php" class="btn-tablink active">Thanh toán</a>
                    </div>
                `;
    totalProductDiv.setAttribute("data-i", totalQuantity);

    if(divTotalPrice){
        divTotalPrice.innerHTML = formatter.format(totalPrice);
    }
}

//Add comment of user
const btnComment = document.getElementById('comment_user');
const btnRating = document.querySelectorAll('.rating input[type=radio]');
const bodyComment = document.getElementById('comment_body');
const contentComment = document.querySelector('.comment_content');

const listComment = document.getElementById('list_comment');

$(document).ready(function () {
    btnComment.onclick = (e)=>{
        let product_id = bodyComment.dataset.product;
        let user_id = bodyComment.dataset.user;
        let content = contentComment.value;

        let rating = 0;
        btnRating.forEach(item => {
            if(item.checked == true){
                rating = item.value;
            }
        });
        $.ajax({
            url: 'add_comment.php',
            type: 'post',
            dataType: 'json',
            data: {
                product_id: product_id,
                user_id: user_id,
                content: content,
                rating: rating,
            }
        }).done(function (reponse) {
            listComment.innerHTML = ``;
            reponse.forEach((item,index )=> {
                listComment.innerHTML += `
                <div class="card p-3 mt-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center">
                            <div class="face_user mr-2"><i class='bx bxs-user-circle'></i></div>
                            <span><small class="font-weight-bold text-primary">${item.user_name}</small></span>
                        </div>
                        <small>${item.create_at}</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4">
                            ${item.content}
                        </div>
                        <div id="star_icon${index}" class="icons align-items-center">
                        </div>
                    </div>
                </div>
                `;
                for (let i = 1; i <= item.rating; i++) {
                    document.getElementById(`star_icon${index}`).innerHTML += "<i class='fa fa-star text-warning'></i>"
                }
            });
            contentComment.value = '';
            btnRating.forEach(item => {
                item.checked = false;
            });
        });
    }
})