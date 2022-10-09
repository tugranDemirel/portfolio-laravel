<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact){
            $contact->read_receipt = true;
            $contact->save();
        }
        return view('admin.contact.show', compact('contact'));
    }

    public function important()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact.important', compact('contacts'));
    }
    public function readReceipt()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact.read-receipt', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Contact deleted successfully');
    }

    public function destroyAll()
    {
        Contact::truncate();
        return redirect()->route('admin.contact.index')->with('success', 'All contacts deleted successfully');
    }

    public function changeStar(Request $request)
    {
        $contact = Contact::findOrFail($request->id);
        $contact->important = !$contact->important;
        $contact->save();
        return response()->json([
            'success' => true,
            'message' => 'Contact updated successfully'
        ]);

    }
}
