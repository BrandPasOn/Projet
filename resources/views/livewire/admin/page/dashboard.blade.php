<section id="dashboard">
    <h2>Statistique</h2>
    <div>
        <label for="select-time">Choose a periode :</label>
        <select wire:model="selectDays" name="select-time" id="select-time">
            <option value="30" selected>30 days</option>
            <option value="14">2 weeks</option>
            <option value="7">1 week</option>
        </select>
    </div>

    <div id="dashboard-statistique">
        
        <div id="new-user">
            <h3>New users : <span>{{ $newUser }}</span></h3>
        </div>
        <div id="new-comments">
            <h3>New comments : <span>{{ $newComment }}</span></h3>
        </div>
        <div id="new-contact">
            <h3>Contacts : <span>{{ $newContact }}</span></h3>
        </div>
        <div id="new-newsletter">
            <h3>Newsletters : <span>{{ $newNewsletter }}</span></h3>
        </div>
    </div>
</section>
