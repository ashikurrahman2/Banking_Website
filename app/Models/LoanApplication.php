<?php

namespace App\Models;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Import Intervention Image Facade
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;
   // Mass assignable attributes
   

    // Default value for status
    protected $attributes = [
        'status' => 'pending',
    ];


    // Relationship with LoanType
    public function loanType()
    {
        return $this->belongsTo(LoanType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Accessor for full name.
     * Combines `F_name` and `M_name` for better presentation.
     */
    public function getFullNameAttribute()
    {
        return "{$this->F_name} {$this->M_name}";
    }

    /**
     * Mutator to format `loan_amount` before saving to database.
     */
    public function setLoanAmountAttribute($value)
    {
        $this->attributes['loan_amount'] = round($value, 2);
    }



    // private static $photo,$imageName, $signature, $signaturename, $directory, $imageUrl, $signatureUrl;
    private static $image, $imageName, $directory, $photoUrl;

    protected $fillable = [
        'loan_type', 
        'name', 
        'F_name', 
        'M_name', 
        'spouse_name', 
        'd_birth', 
        'gender', 
        'pass_num', 
        'country', 
        'phone', 
        'social_phone', 
        'permanent_address', 
        'district', 
        'police_station', 
        'email', 
        'account_no', 
        'branch', 
        'account_holder', 
        'loan_amount', 
        'repayment_period', 
        'bank_name', 
        'photo', 
        'signature', 
        'guarantor_name', 
        'guarantor_father_name', 
        'guarantor_mother_name', 
        'guarantor_nid', 
        'guarantor_thana', 
        'guarantor_zilla', 
        'status',
        'user_id',
    ];

    

    // Function to upload and resize image
    private static function getImageUrl($imageFile, $directory)
    {
        if ($imageFile) {
            self::$imageName = time() . '_' . $imageFile->getClientOriginalName(); // Unique image name
            $path = $directory;
            $imageFile->move($path, self::$imageName);

            // Resize the image using Intervention Image
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read($path . self::$imageName);
            $image->resize(1200, 600); // Resize to required dimensions
            $image->save($path . self::$imageName);

            return $path . self::$imageName;
        }
        return null;
    }

    public static function newLoanApplications($request)
    {
        // self::$imageUrl = $request->file('photo') ? self::getImageUrl($request) : '';
        // self::$signatureUrl = $request->file('signature') ? self::getImageUrl($request) : '';
        $photoUrl = $request->file('photo') ? self::getImageUrl($request->file('photo'), "upload/loan-photos/") : '';
        $signatureUrl = $request->file('signature') ? self::getImageUrl($request->file('signature'), "upload/loan-signatures/") : '';


        $LoanApplication = new self();
        self::saveBasicInfo($LoanApplication, $request, $photoUrl, $signatureUrl);
        // $LoanApplication = new LoanApplication();
        // self::saveBasicInfo($LoanApplication, $request, self::$imageUrl, self::$signatureUrl);
    }

    // public static function updateSetting($request, $LoanApplication)
    // {
    //     self::$directory = "upload/LoanApplication/";

    //     if ($request->file('photo')) {
    //         if (file_exists($LoanApplication->photo)) {
    //             unlink($LoanApplication->photo); // Delete the previous photo
    //         }
    //         self::$imageUrl = self::getImageUrl($request->file('photo'), self::$directory, 481, 112); // Resize logo to 320x120
    //     } else {
    //         self::$imageUrl = $LoanApplication->photo;
    //     }

    //     if ($request->file('signature')) {
    //         if (file_exists($LoanApplication->signature)) {
    //             unlink($LoanApplication->signature); // Delete the previous signature
    //         }
    //         self::$signatureUrl = self::getImageUrl($request->file('signature'), self::$directory, 32, 32); // Resize favicon to 32x32
    //     } else {
    //         self::$signatureUrl = $LoanApplication->signature;
    //     }

    //     self::saveBasicInfo($LoanApplication, $request, self::$imageUrl, self::$signatureUrl);
    // }

    private static function saveBasicInfo($LoanApplication, $request, $photoUrl, $signatureUrl)
    {
        $LoanApplication->loan_type = $request->loan_type;
        $LoanApplication->name = $request->name;
        $LoanApplication->F_name = $request->F_name;
        $LoanApplication->M_name = $request->M_name;
        $LoanApplication->spouse_name = $request->spouse_name;
        $LoanApplication->d_birth = $request->d_birth;
        $LoanApplication->gender = $request->gender;
        $LoanApplication->pass_num = $request->pass_num;
        $LoanApplication->gender = $request->gender;
        $LoanApplication->pass_num = $request->pass_num;
        $LoanApplication->country = $request->country;
        $LoanApplication->phone = $request->phone;
        $LoanApplication->social_phone = $request->social_phone;
        $LoanApplication->permanent_address = $request->permanent_address;
        $LoanApplication->district = $request->district;
        $LoanApplication->police_station = $request->police_station;
        $LoanApplication->email = $request->email;
        $LoanApplication->account_no = $request->account_no;
        $LoanApplication->branch = $request->branch;
        $LoanApplication->account_holder = $request->account_holder;
        $LoanApplication->loan_amount = $request->loan_amount;
        $LoanApplication->repayment_period = $request->repayment_period;
        $LoanApplication->bank_name = $request->bank_name;

        $LoanApplication->photo = $photoUrl;
        $LoanApplication->signature = $signatureUrl;

        $LoanApplication->guarantor_name = $request->guarantor_name;
        $LoanApplication->guarantor_father_name = $request->guarantor_father_name;
        $LoanApplication->guarantor_mother_name = $request->guarantor_mother_name;
        $LoanApplication->guarantor_nid = $request->guarantor_nid;
        $LoanApplication->guarantor_thana = $request->guarantor_thana;
        $LoanApplication->guarantor_zilla = $request->guarantor_zilla;
        // $LoanApplication->status = $request->status;
        $LoanApplication->user_id = $request->user_id;

        $LoanApplication->save();
    }

}
