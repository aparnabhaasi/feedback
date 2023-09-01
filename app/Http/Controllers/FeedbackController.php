<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\FormConfig; // Make sure to import the FormConfig model

class FeedbackController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'location' => 'required|string',
            'rating' => 'required|integer',
            'feedback' => 'required|string',
            'others' => 'nullable|string',
            'how_you_know' => 'nullable|string',
        ]);

        // Set 'how_you_know' to an empty string if it's empty
        $validatedData['how_you_know'] = $request->input('how_you_know', '');

        // Create a new feedback record in the database
        Feedback::create($validatedData);

        // Check the rating and redirect accordingly
        if ($validatedData['rating'] > 3) {
            // Redirect to the Google review page (replace with the actual URL)
            return redirect()->away('https://ictglobaltech.com');
        } else {
            // Display a pop-up message for ratings less than or equal to 3
            return view('feedback')->with('popupMessage', 'Thank you for your feedback!');
        }
    }

    public function update(Request $request)
    {
        foreach ($request->input('config') as $field => $enabled) {
            FormConfig::where('field_name', $field)->update(['enabled' => $enabled]);
        }
        return redirect()->route('form-config.index')->with('success', 'Form configuration updated.');
    }
}
