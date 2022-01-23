<?php

namespace App\Controllers;

use CodeIgniter\Config\Services as ConfigServices;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var IncomingRequest|CLIRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['cookie', 'functional'];

    protected $menuList = [
        'kor'   => [
            [
                'path'      => '/about',
                'name'      => '피트릭스 소개',
                'children'  => [],
            ],
            [
                'path'      => '/employers',
                'name'      => '기업고객',
                'children'  => [],
            ],
            [
                'path'      => '/individuals',
                'name'      => '개인고객',
                'children'  => [],
            ],
            [
                'path'      => '/product',
                'name'      => '제품 소개',
                'children'  => [],
            ],
            [
                'path'      => '/media',
                'name'      => '미디어',
                'children'  => [],
            ],
            [
                'path'      => '/application',
                'name'      => '어플리케이션',
                'children'  => [],
            ],
            [
                'path'      => '/team',
                'name'      => '피트릭스 사람들',
                'children'  => [],
            ],
            [
                'path'      => '/recruit',
                'name'      => '채용',
                'children'  => ['/recruit/view'],
            ],
            [
                'path'      => '/contact',
                'name'      => '문의하기',
                'children'  => [],
            ],
            /* [
                'path'      => '/event',
                'name'      => '이벤트',
                'children'  => ['/event/view'],
            ], */
            /* [
                'path'      => '/reservation',
                'name'      => '피트릭스 예약',
                'children'  => ['/reservation/confirm'],
            ], */
        ],
        'eng'   => [
            [
                'path'      => '/about',
                'name'      => 'FITTRIX Introduction',
                'children'  => [],
            ],
            [
                'path'      => '/team',
                'name'      => 'People of FITTRIX',
                'children'  => [],
            ],
            [
                'path'      => '/services',
                'name'      => 'Service Introduction',
                'children'  => [],
            ],
            [
                'path'      => '/product',
                'name'      => 'Product Introduction',
                'children'  => [],
            ],
            [
                'path'      => '/application',
                'name'      => 'Application',
                'children'  => [],
            ],
            [
                'path'      => '/recruit',
                'name'      => 'Recruitment',
                'children'  => ['/recruit/view'],
            ],
            [
                'path'      => '/event',
                'name'      => 'Event',
                'children'  => ['/event/view'],
            ],
            /* [
                'path'      => '/reservation',
                'name'      => 'FITTRIX Reservation',
                'children'  => ['/reservation/confirm'],
            ], */
        ],
    ];

    private $adminMenu = [
        [
            'name'  => '예약현황',
            'code'  => '01',
            'list'  => [
                [
                    'path'      => 'reservation',
                    'name'      => '예약 리스트',
                    'code'      => '0101',
                ]
            ]
        ],
        [
            'name'  => '피트릭스 스팟 관리',
            'code'  => '02',
            'list'  => [
                [
                    'path'      => 'center',
                    'name'      => '스팟 리스트',
                    'code'      => '0201',
                ],
                [
                    'path'      => 'centerEng',
                    'name'      => '스팟 리스트 (ENG)',
                    'code'      => '0202',
                ],
            ]
        ],
        [
            'name'  => '이벤트 관리',
            'code'  => '03',
            'list'  => [
                [
                    'path'      => 'event',
                    'name'      => '이벤트 리스트',
                    'code'      => '0301',
                ],
                [
                    'path'      => 'eventEng',
                    'name'      => '이벤트 리스트 (ENG)',
                    'code'      => '0302',
                ],
            ]
        ],
        [
            'name'  => '채용 관리',
            'code'  => '04',
            'list'  => [
                [
                    'path'      => 'event',
                    'name'      => '채용공고 리스트',
                    'code'      => '0401',
                ],
                [
                    'path'      => 'eventEng',
                    'name'      => '채용공고 리스트 (ENG)',
                    'code'      => '0402',
                ],
            ]
        ],
        [
            'name'  => 'FAQ',
            'code'  => '05',
            'list'  => [
                [
                    'path'      => 'event',
                    'name'      => 'FAQ 리스트',
                    'code'      => '0501',
                ],
                [
                    'path'      => 'eventEng',
                    'name'      => 'FAQ 리스트 (ENG)',
                    'code'      => '0502',
                ],
            ]
        ],
        [
            'name'  => '팀원 관리',
            'code'  => '06',
            'list'  => [
                [
                    'path'      => 'event',
                    'name'      => '팀원 리스트',
                    'code'      => '0601',
                ],
                [
                    'path'      => 'eventEng',
                    'name'      => '팀원 리스트 (ENG)',
                    'code'      => '0602',
                ],
            ]
        ],
    ];

    protected $lang;
    protected $session;

    /**
     * Constructor.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param LoggerInterface   $logger
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.: $this->session = \Config\Services::session();

        $view = \Config\Services::renderer();
        date_default_timezone_set('Asia/Seoul');

        $this->lang = 'kor';
        $lang = get_cookie('fittrix_locale');
        if (empty($lang) === true) {
            $this->lang = 'kor';
            set_cookie('fittrix_locale', 'kor');
        } else {
            $this->lang = $lang;
        }
        $view->setVar('menu', $this->menuList[$this->lang]);

        $uri = explode('/', uri_string());
        if (count($uri) > 2) {
            $uri = array_slice($uri, 0, 2);
        }
        $view->setVar('uri_string', '/' . implode('/', $uri));
    }

    protected function adminInit()
    {
        $this->session = \Config\Services::session();

        $view = \Config\Services::renderer();
        $view->setVar('menu', $this->adminMenu);
    }

    protected function checkAdmin()
    {
        $userId = $this->session->get('f_admin_id');
        $userName = $this->session->get('f_admin_name');
        $userEmail = $this->session->get('f_admin_email');

        if (empty($userId) === false && empty($userName) === false && empty($userEmail) === false) {
            return true;
        } else {
            return false;
        }
    }
}