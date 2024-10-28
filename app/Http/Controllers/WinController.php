<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Win;
use Illuminate\Support\Facades\DB;


class WinController extends Controller
{
    // Define the index method
    public function index()
    {
    // Retrieve all win records to display in the dashboard
    $wins = Win::all();

    // Retrieve chart data from the session if it exists
    $chartData = session('chartData', [
        'winPoints' => 0,
        'lossPoints' => 0,
    ]);

    // Return the splash view with wins and chartData
    return view('app', compact('wins', 'chartData'));
    }


    public function store(Request $request)
        {
            $data = $request->validate([
                'description' => 'required|string|max:255',
                'is_win' => 'required|boolean',
                'risk' => 'required|numeric|min:0',
                'risk_reward_ratio' => 'required|numeric|min:0',
                'session' => 'required|string|in:Asian,London,NyAm,NyPM', 

            ]);

            // Store trade data without amount
            Win::create([
                'description' => $data['description'],
                'is_win' => $data['is_win'],
                'risk' => $data['risk'],
                'risk_reward_ratio' => $data['risk_reward_ratio'],
                'session' => $data['session'], // Store the session
                'created_at' => now(),
                'updated_at' => now(), // Optionally include updated_at
            ]);
        

            return redirect('/app');
        }

    private function calculateChartData()
    {
        $wins = Win::all();
        $winPoints = 0;
        $lossPoints = 0;

        foreach ($wins as $trade) {
            $risk = $trade->risk;
            $rewardRatio = $trade->risk_reward_ratio;

            if ($trade->is_win) {
                $winPoints += $risk * $rewardRatio; // Calculate points for win
            } else {
                $ossPoints += $risk; // Calculate points for loss
            }
        }

        return [
            'winPoints' => $winPoints,
            'lossPoints' => $lossPoints,
        ];
    }

    public function destroy($id)
    {
    $win = Win::findOrFail($id); // Find the record or fail

    // Store the deleted record in history
    DB::table('win_history')->insert([
        'description' => $win->description,
        'is_win' => $win->is_win,
        'risk' => $win->risk,
        'risk_reward_ratio' => $win->risk_reward_ratio,
        'created_at' => $win->created_at,
        'deleted_at' => now(), // Timestamp when deleted
    ]);

    $win->delete(); // Delete the record

    return redirect()->route('app')->with('success', 'Record deleted successfully.');
    }
}

