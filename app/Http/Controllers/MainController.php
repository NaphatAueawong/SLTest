<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\CustomerProfile;
use App\Course;

class MainController extends Controller
{
    public function showHomePage($customerID)
    {
        $customerProfile = Customer::find($customerID)->customerProfile;
        return view('/main/homePage')->with('customerProfile', $customerProfile);
    }

    public function showEditProfile($customerID)
    {
        $customerProfile = Customer::find($customerID)->customerProfile;
        if(empty($customerProfile)){
            $customerProfile = new CustomerProfile;
            $customerProfile->id = $customerID;
            $customerProfile->save();
        }
        return view(('/main/editProfile'), ['customerID' => $customerID, 
                                        'customerProfile' => $customerProfile]);
    }

    public function editProfile(Request $request, $customerID)
    {
        $customerProfile = CustomerProfile::find($customerID);
        if(empty($customerProfile)){
            $customerProfile = new CustomerProfile;
        }
        $customerProfile->id           = $customerID;
        $customerProfile->firstname    = $request->input('firstname');
        $customerProfile->lastname     = $request->input('lastname');
        $customerProfile->nickname     = $request->input('nickname');
        $customerProfile->birthday     = $request->input('birthday');
        $customerProfile->gender       = $request->input('gender');
        $customerProfile->save();

        return redirect()->action(
            'MainController@showHomePage', ['customerID' => $customerID]
        );
    }

    public function showCreateCourse($instructorID)
    {
        return view('/main/createCourse')->with('instructorID', $instructorID);
    }

    public function createCourse(Request $request, $instructorID)
    {
        $course                     = new Course;
        $course->instructorID       = $instructorID;
        $course->name               = $request->input('name');
        $course->description        = $request->input('description');
        $course->category           = $request->input('category');
        $course->subject            = $request->input('subject');
        $course->startTime          = $request->input('startTime');
        $course->endTime            = $request->input('endTime');
        $course->numberOfStudent    = $request->input('numberOfStudent');
        $course->save();
        return redirect()->action(
            'MainController@showCourse', ['customerID' => $instructorID]
        );
    }

    public function showCourse($customerID)
    {
        $courses = Course::all();
        return view(('/main/course'), ['customerID'=> $customerID,
                                            'courses'  => $courses
                                        ]);
    }

    public function searchCouse (Request $request, $id, $type)
    {
        $nameCourse = $request->input('name');
        $startTime  = $request->input('startTime');
        $endTime    = $request->input('endTime');
        if($type == 'instructor'){
            $courses = Course::where('instructorID', $id)
                                    ->where('name', 'like', "%{$nameCourse}%")
                                    ->whereDate('startTime', '>=', $startTime)
                                    ->whereDate('endTime', '<=', $endTime)
                                    ->get();
            return view(('/main/course'), ['customerID'=> $id,
                                            'courses'  => $courses
                                        ]);
        }else{
            $courses = Course::where('name', 'like', "%{$nameCourse}%")
                                    ->whereDate('startTime', '>=', $startTime)
                                    ->whereDate('endTime', '<=', $endTime)  
                                    ->get();
            return view(('/main/course'), ['customerID'=> $id,
                                            'courses'  => $courses
                                        ]);
        }
    }
}
