<div class="list-group">
                <a href="{{ url('start') }}" class="list-group-item list-group-item-action">ZeroFox Home</a>
                <a href="{{ url('shop\{id}') }}" class="list-group-item list-group-item-action">Shop</a>
                <a href="{{ url('mineprofile') }}" class="list-group-item list-group-item-action">Add profile</a>
                <a href="{{ url('profile\{user.id}') }}" class="list-group-item list-group-item-action">My profile</a>
                <a href="{{ url('address\{user.id}') }}" class="list-group-item list-group-item-action">Add address</a>
                <a href="{{ url('mine') }}" class="list-group-item list-group-item-action">My address</a>
                <a href="{{ url('cart') }}" class="list-group-item list-group-item-action">My products</a>
            </div>