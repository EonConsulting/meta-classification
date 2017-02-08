<?php
/**
 * Created by PhpStorm.
 * User: jharing10
 * Date: 2017/02/06
 * Time: 3:38 PM
 */

namespace EONConsulting\Meta\Database\Seeders;


use EONConsulting\Meta\Models\MetaClassification;
use EONConsulting\Meta\Models\MetaElement;
use Illuminate\Database\Seeder;

class MetaClassificationSeeders extends Seeder {

    protected $data = [
        'Material (What)' => [
            'Content Information Type' => [
                'Name',
                'Description',
                'UID',
                'Required',
                'PID',
                'Version',
                'Format',
                'Source',
                'Title'
            ],
            'Content Tag Type' => [
                'Question',
                'Important',
                'Fact',
                'Remember',
                'Hint / Tip',
                'Reflection'
            ],
            'Access Type' => [
                'Internal Use',
                'Open to public'
            ],
            'Application Type' => [
                'Self-Study',
                'Course Based'
            ],
            'Collaboration Type' => [
                'Student-to-student',
                'Student-to-lecturer',
                'Student-to-group',
                'Student-to-content',
                'Lecturer-to-lecturer',
                'Lecturer-to-group',
                'Lecturer-to-content'
            ],
            'Coverage Type' => [
                'Spacial Topic - Geometry (Where)',
                'Temporal Topic - Synchronization (When)'
            ],
            'License Type' => [
                'OSI approved Open Source',
                'Public Domain',
                'Creative Commons Attribution',
                'Commercial',
                'Unisa Specific'
            ],
            'Costing Type' => [
                'Free',
                'Subscription',
                'License Fee'
            ],
            'Discipline Type' => [
                'Arts' => [
                    'Performing Arts',
                    'Visual Arts'
                ],
                'Humanities' => [
                    'Geography',
                    'History',
                    'Language and Literature',
                    'Philosophy'
                ],
                'Social Sciences' => [
                    'Economics',
                    'Law',
                    'Political Science',
                    'Psychology',
                    'Sociology'
                ],
                'Sciences' => [
                    'Biology',
                    'Chemistry',
                    'Earth and Space Sciences',
                    'Mathematics',
                    'Physics'
                ],
                'Technology' => [
                    'Agronomy',
                    'Computer Science',
                    'Engineering',
                    'Medicine'
                ]
            ],
            'Content Type' => [
                'Learning Content',
                'Learning Outcomes',
                'Lecturers Voice',
                'Assessments',
                'Multimedia',
                'Textbooks',
                'Web 2.0',
                'Feedback',
                'Reminders'
            ],
            'Rating Type' => [
                'Popularity' => [
                    'Always',
                    'Often',
                    'Sometimes',
                    'Rarely',
                    'Never'
                ],
                'Star' => [
                    '*',
                    '**',
                    '***',
                    '****',
                    '*****'
                ],
                'Satisfaction' => [
                    'Not at all Acceptable',
                    'Slightly Acceptable',
                    'Moderately Acceptable',
                    'Very Acceptable',
                    'Completely Acceptable'
                ]
            ],
            'Qualification Type' => [
                'Certificate',
                'Diploma',
                'Degree',
                'Honors Degree',
                'Masters Degree',
                'Doctoral Degree'
            ]
        ],
        'Functionality (How)' => [
            'Pedagogical Type' => [
                'Outcome Based',
                'Schedule Based',
                'Content Based'
            ],
            'Application Type' => [
                'Online',
                'Offline'
            ],
            'Component Functional Type' => [
                'Analytics',
                'Study aid (help)',
                'Assessment',
                'Content',
                'Media',
                'Dashboard'
            ],
            'System Use Type' => [
                'Frontend use',
                'Backend use'
            ]
        ],
        'Geometry (Where)' => [
            'Physical Location Type' => [
                'Physical Address',
                'GPS Coordinates'
            ],
            'Solution Location Type' => [
                'Storyline',
                'Apps Repository',
                'Lecturer Interface',
                'Student Interface',
                'Administrator Interface'
            ],
            'College Type' => [
                'Accounting Sciences',
                'Agriculture and Environmental Sciences',
                'Economic and Management Sciences',
                'Education',
                'Human Sciences',
                'Law',
                'Science, Engineering and Technology',
                'Graduate Studies'
            ],
            'School Type' => [
                'School of Accountancy',
                'School of Applied Accountancy',
                'School of Agriculture and Life Sciences',
                'School of Environmental Sciences',
                'School of Educational Studies',
                'School of Teacher Education',
                'School of Arts',
                'School of Humanities',
                'School of Social Sciences',
                'School of Interdisciplinary Research and Graduate Studies (SIRGS)'
            ],
            'Department Type' => [
                'Department of Auditing',
                'Department of Financial Accounting',
                'Department of Management Accounting',
                'Department of Taxation',
                'Department of Financial Governance',
                'Department of Financial Intelligence',
                'Department of Agriculture and Animal Health',
                'Department of Life and Consumer Sciences',
                'Department of Environmental Sciences',
                'Department of Geography',
                'Department of Decision Sciences',
                'Department of Economics',
                'Department of Finance, Risk Management and Banking',
                'Department of Business Management',
                'Department of Human Resources Management',
                'Department of Industrial and Organisational Psychology',
                'Department of Marketing and Retail',
                'South African Journal of Labour Relations Management',
                'Entrepreneurship, Supply Chain, Transport, Tourism and Logistics Management',
                'Department of Public Administration and Management',
                'Department of Operations Management',
                'Department of Adult Basic Education',
                'Department of Educational Foundations',
                'Department of Psychology of Education',
                'Department of Inclusive Education',
                'Department of Educational Leadership and Management',
                'Department of Mathematics Education',
                'Department of Science and Technology Education',
                'Department of Language Education, Arts and Culture',
                'Department of Curriculum and Instructional Studies',
                'Department of Early Childhood Education',
                'Department of African Languages',
                'Department of Afrikaans and Theory of Literature',
                'Department of Art History, Visual Arts and Musicology',
                'Department of Communication Science',
                'Department of English Studies',
                'Department of Information Science',
                'Department of Linguistics and Modern Languages',
                'Department of Anthropology and Archaeology',
                'Department of Biblical and Ancient Studies',
                'Department of Christian Spirituality, Church History and Missiology',
                'Department of History',
                'Department of Philosophy, Practical and Systematic Theology',
                'Department of Religious Studies and Arabic',
                'Department of Development Studies',
                'Department of Health Studies',
                'Department of Political Sciences',
                'Department of Psychology',
                'Department of Social Work',
                'Department of Sociology',
                'Department of Criminal and Procedural Law',
                'Department of Jurisprudence',
                'Department of Mercantile Law',
                'Department of Private Law',
                'Department of Public, Constitutional and International Law',
                'Department of Criminology and Security Science',
                'Department of Corrections Management',
                'Department of Police Practice',
                'Department of Chemistry',
                'Department of Mathematical Sciences',
                'Department of Physics',
                'Department of Statistics',
                'Department of Civil and Chemical Engineering',
                'Department of Mechanical and Industrial Engineering',
                'Department of Electrical and Mining Engineering',
                'Postgraduate Administration Department'
            ],
            'Chair Type' => [
                'South African Research Chair in Development Education',
                'South African Research Chair in Social Policy',
                'Unesco - Unisa Africa Chair in nanoscience and nanotechnology'
            ],
            'Center Type' => [
                'Centre for Accounting Studies',
                'Centre for Sustainable Agriculture and Environmental Sciences',
                'Centre for Business Management',
                'Centre for Decision Sciences',
                'Centre for Industrial and Organisational Psychology',
                'Centre for Transport Economics, Logistics and Tourism',
                'Centre for Continuing Education and Training',
                'Centre for Applied Information and Communication',
                'Centre for Applied Psychology',
                'Centre for Pan African Languages and Cultural Development',
                'Khanokhulu Centre',
                'The John Povey Centre for the Study of English in Southern Africa',
                'Tirisano Centre',
                'Centre for Basic Legal Education',
                'Centre for Business Law',
                'Centre for Criminological Sciences',
                'Centre for Foreign and Comparative Law',
                'Centre for Public Law Studies',
                'Centre for Software Engineering (CENSE)'
            ],
            'Bureau Type' => [
                'Bureau of Market Research',
                'SA Business Review'
            ],
            'Institute Type' => [
                'Institute of Gender Studies',
                'Research Institute for Theology and Religion',
                'WIPHOLD-Brigalia Ban Chair in Electoral Democracy in Africa',
                'Institute for Dispute Resolution in Africa (IDRA)',
                'Archie Mafeje Research Institute (AMRI)',
                'Institute for African Renaissance Studies (IARS)',
                'Institute for Open and Distance Learning (IODL)',
                'Institute for Science and Technology Education (ISTE)',
                'Institute for Social and Health Studies (ISHS)'
            ],
            'Office Type' => [
                'Ethiopia Graduate Office (EGO)'
            ],
            'Unit Type' => [
                'Applied Behavioural Ecology and Ecosystem Research Unit',
                'Anthropology and Archaeology Museum',
                'African Languages Literary Information Museum',
                'Unisa Art Gallery',
                'Unisa Law Clinic'
            ],
            'Distribution Type' => [
                'On campus',
                'Correspondence',
                'Online'
            ],
            'Location Type' => [
                'International students',
                'RSA students',
                'Location bound students'
            ],
            'Interest Type' => [
                'Course',
                'Module',
                'Subject',
                'Topic',
                'Idea',
                'Asset'
            ]
        ],
        'User (Who)' => [
            'Contributor Type' => [
                'System User',
                'Role Type',
                'Institution Type'
            ],
            'Creator Type' => [
                'System User',
                'Role Type',
                'Institution Type'
            ],
            'Publisher Type' => [
                'System User',
                'Role Type',
                'Institution Type'
            ],
            'Role Type' => [
                'Student',
                'Lecturer',
                'Tutor',
                'Administrator',
                'Proctor',
                'Facilitator',
                'Assistant',
                'Editor',
                'Moderator',
                'Subject Matter Expert'
            ],
            'Institution Type' => [
                'Faculty',
                'School',
                'Department',
                'College',
                'Academy',
                'Institute'
            ],
            'Status Type' => [
                'Potential student',
                'Registered student',
                'Alumni'
            ],
            'Profile Type' => [
                'Language',
                'Ethnicity',
                'Race',
                'Sex',
                'Date-of-birth',
                'Autonomous',
                'Nationality'
            ]
        ],
        'Synchronization (When)' => [
            'Date Time Type' => [
                'Date Time Stamp'
            ],
            'Study Cycle Type' => [
                'Application',
                'Admittance',
                'Registration',
                'Study',
                'Examination',
                'Graduation'
            ],
            'Student Cycle Type' => [
                'Undergraduate',
                'Graduate',
                'Postgraduate'
            ],
            'Term Cycle Type' => [
                '1st Term',
                '2nd Term',
                '3rd Term',
                '4th Term'
            ],
            'Environment Type' => [
                'Full-time',
                'Part-time'
            ],
            'Duration Type' => [
                'Course Duration',
                'Evaluation Duration',
                'Certification Duration'
            ],
            'Expiration Type' => [
                'Time Cycle',
                'Event'
            ]
        ],
        'Purpose (Why)' => [
            'Study Type' => [
                'Revision',
                '1st registration',
                'Repeat Student'
            ],
            'Goal Type' => [
                'Professional Qualification',
                'Certification',
                'Continued Education',
                'Research',
                'Professional Registration'
            ],
            'Concern Type' => [
                'Reliability',
                'Usability',
                'Responsiveness',
                'Security'
            ],
            'Study Constraint Type' => [
                'Time',
                'Money',
                'Technology'
            ],
            'Risk Type' => [
                'System',
                'Integration',
                '3rd Party Components'
            ]
        ]
    ];

    public function run() {

        foreach($this->data as $key => $value) {
            $meta_classification = new MetaClassification;

            $keys = explode('(', $key);

            $meta_classification->name = $keys[0];
            $meta_classification->slug = str_slug($keys[0]);
            $meta_classification->classification = str_replace(')', '', $keys[1]);

            $meta_classification->save();

            $this->insert_loop($value, null, $meta_classification->id);
        }

    }

    function insert_loop($data, $parent_id = false, $classification_id = false) {

        if(is_array($data)) {
            foreach($data as $key => $value) {

                if(is_int($key))
                    $key = $value;

                $element = new MetaElement;
                $element->name = $key;
                $element->slug = str_slug($key);
                $element->parent_id = $parent_id;
                $element->classification_id = $classification_id;
                $element->required = 0;
                $element->version = 1;

                $element->save();

                if(is_array($value)) {
                    $this->insert_loop($value, $element->id, $classification_id);
                }
            }
        } else {
            $element = new MetaElement;
            $element->name = $data;
            $element->slug = str_slug($data);
            $element->parent_id = $parent_id;
            $element->classification_id = $classification_id;
            $element->required = 0;
            $element->version = 1;

            $element->save();
        }

    }

}