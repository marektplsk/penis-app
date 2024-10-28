<div class="mt-8">
    <h2 class="text-2xl font-bold mb-4">Add Win/Loss</h2>
    <form action="{{ route('app.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="description" placeholder="Description" class="border rounded p-2 w-full" required>
        <select name="is_win" class="border rounded p-2 w-full" required>
            <option value="1">Win</option>
            <option value="0">Loss</option>
        </select>
        <input type="number" step="0.01" name="risk" placeholder="Risk (%)" class="border rounded p-2 w-full" required>
        <input type="number" step="0.01" name="risk_reward_ratio" placeholder="Risk Reward Ratio (e.g., 2 for 1:2)" class="border rounded p-2 w-full" required>
        
        <select name="session" class="border rounded p-2 w-full" required>
            <option value="Asian">Asian Session</option>
            <option value="London">London Session</option>
            <option value="New York">New York Session</option>
            <option value="NY PM">NY PM Session</option>
        </select>
        
        <button type="submit" class="bg-blue-500 text-white rounded p-2 w-full">Submit</button>
    </form>
</div>
