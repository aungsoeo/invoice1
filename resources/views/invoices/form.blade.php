<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Invoice No.</label>
            <input type="text" class="form-control" v-model="form.invoice">
            <p v-if="errors.invoice_no" class="error">@{{ errors.invoice_no[0] }}</p>
        </div>

        
    </div>

</div>

<hr>

<div v-if="errors.products_empty">
    <p class="alert alert-danger">@{{ errors.products_empty[0] }}</p>
</div>

<table class="table table-bordered table-form">
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="product in form.products">
        <td class="table-name" :class="{'table-error': errors['products.' + $index + '.name']}">   
            <input type="text" class="table-control" v-model="product.name">
        </td>
        </td>
        <td class="table-price" :class="{'table-error': errors['products.' + $index + '.price']}">
            <input type="text" class="table-control" v-model="product.price">
        </td>
        <td class="table-qty" :class="{'table-error': errors['products.' + $index + '.qty']}">
            <input type="text" class="table-control" v-model="product.qty">
        </td>
        <td class="table-total">
            <span class="table-text">@{{product.qty * product.price}}</span>
        </td>
        <td class="table-remove">
            <span @click="remove(product)" class="table-control btn btn-remove">Remove</span>
        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td class="table-empty" colspan="2">
            <span @click="addLine" class="btn btn-default table-add_line">Add Line</span>
        </td>
        <td class="table-label">Sub Total</td>
        <td class="table-amount">@{{subTotal}}</td>
    </tr>
    <tr>
        <td class="table-empty" colspan="2"></td>
        <td class="table-label">Discount</td>
        <td class="table-discount" :class="{'table-error': errors.discount}">
            <input type="text" class="table-discount_input" v-model="form.discount">
        </td>
    </tr>
    <tr>
        <td class="table-empty" colspan="2"></td>
        <td class="table-label">Grand Total</td>
        <td class="table-amount">@{{grandTotal}}</td>
    </tr>
    </tfoot>
</table>
