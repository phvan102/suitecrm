<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

$mod_strings = array(
    'LBL_RECORDS_SKIPPED_DUE_TO_ERROR' => 'hàng không được nhập do lỗi',
    'LBL_UPDATE_SUCCESSFULLY' => 'đã cập nhật hồ sơ thành công',
    'LBL_SUCCESSFULLY_IMPORTED' => 'các hồ sơ đã được tạo',
    'LBL_STEP_4_TITLE' => 'Bước {0}: Nhập File',
    'LBL_STEP_5_TITLE' => 'Bước {0}: Xem kết quả nhập',
    'LBL_CUSTOM_ENCLOSURE' => 'Các trường đạt điều kiện bởi:',
    'LBL_ERROR_UNABLE_TO_PUBLISH' => 'Không thể xuất bản. Có một bản đồ nhập khác được xuất bản cùng tên.',
    'LBL_ERROR_UNABLE_TO_UNPUBLISH' => 'Không thể hủy xuất bản bản đồ thuộc sở hữu của người dùng khác. Bạn sở hữu một bản đồ nhập khẩu cùng tên.',
    'LBL_ERROR_IMPORTS_NOT_SET_UP' => 'Nhập khẩu không được thiết lập cho loại mô-đun này',
    'LBL_IMPORT_TYPE' => 'Bạn muốn làm gì với dữ liệu nhập khẩu này?',
    'LBL_IMPORT_BUTTON' => 'Chỉ tạo mới hồ sơ',
    'LBL_UPDATE_BUTTON' => 'Tạo hồ sơ mới và Cập Nhật hồ sơ hiện tại',
    'LBL_CREATE_BUTTON_HELP' => 'Sử dụng tùy chọn này để tạo bản ghi mới. Lưu ý: Dòng trong tập tin nhập chứa giá trị khớp với các ID của bản ghi đang có sẽ không được nhập nếu các giá trị được ánh xạ tới trường ID.',
    'LBL_UPDATE_BUTTON_HELP' => 'Sử dụng tùy chọn này để cập nhật các bản ghi hiện có. Dữ liệu trong tệp nhập sẽ được đối sánh với bản ghi hiện có dựa trên ID bản ghi trong tệp nhập.',
    'LBL_ERROR_INVALID_BOOL' => 'Giá trị boolean không hợp lệ',
    'LBL_IMPORT_ERROR' => 'Lỗi nhập:',
    'LBL_ERROR' => 'Lỗi',
    'LBL_FIELD_NAME' => 'Tên vùng',
    'LBL_VALUE' => 'Giá trị',
    'LBL_NONE' => 'Không có',
    'LBL_REQUIRED_VALUE' => 'Yêu cầu giá trị thiếu',
    'LBL_ERROR_SYNC_USERS' => 'Giá trị không hợp lệ để đồng bộ hóa với Outlook: ',
    'LBL_ID_EXISTS_ALREADY' => 'ID đã tồn tại trong bảng này',
    'LBL_ASSIGNED_USER' => 'Nếu người dùng không tồn tại sử dụng người dùng hiện tại',
    'LBL_ERROR_DELETING_RECORD' => 'Lỗi xóa hồ sơ:',
    'LBL_ERROR_INVALID_ID' => 'ID đưa ra là quá dài để phù hợp trong các trường (chiều dài tối đa là 36 ký tự)',
    'LBL_ERROR_INVALID_PHONE' => 'Số điện thoại không hợp lệ',
    'LBL_ERROR_INVALID_NAME' => 'Chuỗi quá dài để phù hợp trong các trường',
    'LBL_ERROR_INVALID_VARCHAR' => 'Chuỗi quá dài để phù hợp trong các trường',
    'LBL_ERROR_INVALID_DATE' => 'Ngày không hợp lệ',
    'LBL_ERROR_INVALID_DATETIME' => 'Datetime không hợp lệ',
    'LBL_ERROR_INVALID_DATETIMECOMBO' => 'Datetime không hợp lệ',
    'LBL_ERROR_INVALID_TIME' => 'Thời gian không hợp lệ',
    'LBL_ERROR_INVALID_INT' => 'Giá trị nguyên không hợp lệ',
    'LBL_ERROR_INVALID_NUM' => 'Giá trị số không hợp lệ',
    'LBL_ERROR_INVALID_EMAIL' => 'Địa chỉ Email không hợp lệ',
    'LBL_ERROR_INVALID_USER' => 'Tên người dùng không hợp lệ hoặc ID',
    'LBL_ERROR_INVALID_TEAM' => 'Tên nhóm không hợp lệ hoặc ID',
    'LBL_ERROR_INVALID_ACCOUNT' => 'Tên tài khoản không hợp lệ hoặc ID',
    'LBL_ERROR_INVALID_RELATE' => 'Trường quan hệ không hợp lệ',
    'LBL_ERROR_INVALID_CURRENCY' => 'Giá trị tiền tệ không hợp lệ',
    'LBL_ERROR_INVALID_FLOAT' => 'Số điểm không hợp lệ',
    'LBL_ERROR_NOT_IN_ENUM' => 'Giá trị không có trong danh sách thả xuống. Các giá trị được cho phép là: ',
    'LBL_IMPORT_MODULE_ERROR_NO_UPLOAD' => 'Tệp không được tải lên thành công. Có thể là cài đặt \'upload_max_filesize\' trong tệp php.ini của bạn được thiết lập là một số nhỏ',
    'LBL_MODULE_NAME' => 'Nhập',
    'LBL_MODULE_SUCCESSFUL' => 'Import thành công ',
    'LBL_USER_UPDATED_LEAD' => 'Người cập nhật',
    'LBL_DATE_UPDATE_LEAD' => 'Ngày cập nhật',
    'LBL_LINK_FILE' => 'Link File',
    'LBL_NUMBER_IMPORT_LEAD' => 'Lần import trong ngày',
    'LBL_ROW' => ' hàng! ',
    'LBL_TRY_AGAIN' => 'Thử lại',
    'LBL_IMPORT_ERROR_MAX_REC_LIMIT_REACHED' => 'Tệp nhập chứa {0} hàng. Số dòng tối ưu là {1}. Nhiều dòng có thể làm chậm quá trình nhập. Nhấn OK để tiếp tục nhập. Nhấp Cancel để sửa và tải lên lại tệp nhập.',
    'ERR_IMPORT_SYSTEM_ADMININSTRATOR' => 'Bạn không thể nhập người dùng quản trị viên hệ thống',
    'ERR_MULTIPLE' => 'Nhiều cột đã được xác định với tên trường giống nhau.',
    'ERR_MISSING_REQUIRED_FIELDS' => 'Thiếu các trường bắt buộc:',
    'ERR_SELECT_FILE' => 'Chọn một tập tin để tải lên.',
    'LBL_SELECT_FILE' => 'Chọn file:',
    'LBL_EXTERNAL_SOURCE' => 'một ứng dụng hoặc dịch vụ bên ngoài',
    'LBL_CUSTOM_DELIMITER' => 'Các trường được phân cách bởi:',
    'LBL_DONT_MAP' => '--Không phải bản đồ trường này--',
    'LBL_STEP_MODULE' => 'Module nào mà bạn muốn nhập dữ liệu vào?',
    'LBL_STEP_1_TITLE' => 'Bước 1: Lựa chọn nguồn dữ liệu',
    'LBL_CONFIRM_TITLE' => 'Bước {0}: xác nhận thuộc tính file nhập',
    'LBL_MICROSOFT_OUTLOOK' => 'Microsoft Outlook',
    'LBL_MICROSOFT_OUTLOOK_HELP' => 'Ánh xạ tùy chỉnh cho Microsoft Outlook dựa trên tệp nhập được phân cách bằng dấu phẩy (.csv). Nếu tệp nhập của bạn được phân định bằng tab, ánh xạ sẽ không được áp dụng như mong đợi.',
    'LBL_SALESFORCE' => 'Salesforce.com',
    'LBL_PUBLISH' => 'Xuất bản',
    'LBL_DELETE' => 'Xóa',
    'LBL_PUBLISHED_SOURCES' => 'Để sử dụng cài đặt nhập đặt sẵn, hãy chọn từ bên dưới:',
    'LBL_UNPUBLISH' => 'Chưa xuất bản',
    'LBL_NEXT' => 'Tiếp theo >',
    'LBL_BACK' => 'Quay lại',
    'LBL_STEP_2_TITLE' => 'Bước {0}: Tải lên tệp nhập',
    'LBL_LEADS_TITLE' => 'THÊM DANH SÁCH ĐẦU MỐI TỪ IMPORT FILE',
    "LBL_INTRODUCTION_LEADS_1" => "*Lưu ý: Sau khi tải tệp mẫu xuống",
    "LBL_INTRODUCTION_LEADS_2" => "Tuyệt đối không thay đổi vị trí của các cột và các hàng trong file mẫu!",
    "LBL_INTRODUCTION_LEADS_3" => "*Lưu ý:",
    "LBL_INTRODUCTION_LEADS_4" => "Có 2 cách thêm Lead, 1. Không cần nhóm, 2.Chọn chiến dịch",
    "LBL_CHOOSE_GROUP_SECURITY" => "-- Chọn Nhóm --",
    "LBL_CHOOSE_COMPAIGNS" => "-- Chọn chiến dịch --",
    "LBL_CHOOSE_IMPORT_NUMBER" => "-- Chọn số lần import --",
    'LBL_HAS_HEADER' => 'Hàng tiêu đề:',
    'LBL_NUM_1' => '1.',
    'LBL_NUM_2' => '2.',
    'LBL_NUM_3' => '3.',
    'LBL_NUM_4' => '4.',
    'LBL_NUM_5' => '5.',
    'LBL_NUM_6' => '6.',
    'LBL_NUM_7' => '7.',
    'LBL_NUM_8' => '8.',
    'LBL_NUM_9' => '9.',
    'LBL_NUM_10' => '10.',
    'LBL_NUM_11' => '11.',
    'LBL_NUM_12' => '12.',
    'LBL_NOTES' => 'Ghi chú:',
    'LBL_STEP_3_TITLE' => 'Bước {0}: xác nhận trường ánh xạ',
    'LBL_STEP_DUP_TITLE' => 'Bước {0}: kiểm tra có thể trùng lặp',
    'LBL_DATABASE_FIELD' => 'Trường Module',
    'LBL_HEADER_ROW' => 'Hàng tiêu đề',
    'LBL_HEADER_ROW_OPTION_HELP' => 'Chọn nếu hàng nhập tập tin, trên cùng một dòng tiêu đề có chứa các nhãn trường.',
    'LBL_ROW' => 'Hàng',
    'LBL_CONTACTS_NOTE_1' => 'Tên đầy đủ hoặc tên cuối cùng phải được lập bản đồ.',
    'LBL_CONTACTS_NOTE_2' => 'Nếu tên đầy đủ được ánh xạ, thì họ và tên được bỏ qua.',
    'LBL_CONTACTS_NOTE_3' => 'Nếu tên đầy đủ được ánh xạ, thì dữ liệu của tên đầy đủ sẽ được chia thành họ và tên khi được nhập vào cơ sở dữ liệu.',
    'LBL_CONTACTS_NOTE_4' => 'Các trường kết thúc ở Đường địa chỉ 2 và Đường địa chỉ 3 được nối với nhau với Trường đường địa chỉ chính khi được nhập vào cơ sở dữ liệu.',
    'LBL_ACCOUNTS_NOTE_1' => 'Các trường kết thúc ở Đường địa chỉ 2 và Đường địa chỉ 3 được nối với nhau với Trường đường địa chỉ chính khi được nhập vào cơ sở dữ liệu.',
    'LBL_IMPORT_NOW' => 'Nhập vào ngay',
    'LBL_' => '',
    'LBL_CANNOT_OPEN' => 'Không thể mở file đã nhập để đọc',
    'LBL_CANNOT_FIND_USER_ASSIGN' => 'Không thể import bản ghi cho module Lead vì không tìm thấy người gán tại bản ghi số ',
    'LBL_CANNOT_FIND_CAMPAIGN' => 'Vui lòng chọn chiến dịch!',
    'LBL_NO_LINES' => 'Không có dòng nào được phát hiện trong tệp nhập của bạn. Vui lòng đảm bảo không có dòng trống trong tệp của bạn và thử lại.',
    'LBL_SUCCESS' => 'Thành công:',
    'LBL_LAST_IMPORT_UNDONE' => 'Việc nhập khẩu đã được hoàn tác.',
    'LBL_NO_IMPORT_TO_UNDO' => 'Không có nhập khẩu nào để hoàn tác.',
    'LBL_CREATED_TAB' => 'Hồ sơ đã tạo',
    'LBL_DUPLICATE_TAB' => 'Bản sao',
    'LBL_ERROR_TAB' => 'Lỗi',
    'LBL_IMPORT_MORE' => 'Nhập lại',
    'LBL_FINISHED' => 'Đã hoàn thành',
    'LBL_UNDO_LAST_IMPORT' => 'Hoàn tác nhập khẩu',
    'LBL_DUPLICATES' => 'Tìm thấy bản sao',
    'LNK_DUPLICATE_LIST' => 'Tải xuống danh sách các bản sao',
    'LNK_ERROR_LIST' => 'Tải xuống danh sách lỗi',
    'LNK_RECORDS_SKIPPED_DUE_TO_ERROR' => 'Tải xuống danh sách hàng không được nhập',
    'LBL_INDEX_USED' => 'Các trường để kiểm tra:',
    'LBL_INDEX_NOT_USED' => 'Các trường có sẵn:',
    'LBL_IMPORT_FIELDDEF_ID' => 'Số ID duy nhất',
    'LBL_IMPORT_FIELDDEF_RELATE' => 'Tên hoặc ID',
    'LBL_IMPORT_FIELDDEF_PHONE' => 'Số điện thoại',
    'LBL_IMPORT_FIELDDEF_TEAM_LIST' => 'Tên nhóm hoặc ID',
    'LBL_IMPORT_FIELDDEF_NAME' => 'Bất kỳ văn bản',
    'LBL_IMPORT_FIELDDEF_VARCHAR' => 'Bất kỳ văn bản',
    'LBL_IMPORT_FIELDDEF_TEXT' => 'Bất kỳ văn bản',
    'LBL_IMPORT_FIELDDEF_TIME' => 'Thời gian',
    'LBL_IMPORT_FIELDDEF_DATE' => 'Ngày giờ',
    'LBL_IMPORT_FIELDDEF_ASSIGNED_USER_NAME' => 'Tên người dùng hoặc ID',
    'LBL_IMPORT_FIELDDEF_BOOL' => '\'0\' hay \'1\'',
    'LBL_IMPORT_FIELDDEF_ENUM' => 'Danh sách',
    'LBL_IMPORT_FIELDDEF_EMAIL' => 'Địa chỉ Email',
    'LBL_IMPORT_FIELDDEF_INT' => 'Số (Không có thập phân)',
    'LBL_IMPORT_FIELDDEF_DOUBLE' => 'Số (Không có thập phân)',
    'LBL_IMPORT_FIELDDEF_NUM' => 'Số (Không có thập phân)',
    'LBL_IMPORT_FIELDDEF_CURRENCY' => 'Số (Cho phép có thập phân)',
    'LBL_IMPORT_FIELDDEF_FLOAT' => 'Số (Cho phép có thập phân)',
    'LBL_DATE_FORMAT' => 'Định dạng ngày:',
    'LBL_TIME_FORMAT' => 'Định dạng thời gian:',
    'LBL_TIMEZONE' => 'Múi giờ:',
    'LBL_ADD_ROW' => 'Thêm các trường',
    'LBL_REMOVE_ROW' => 'Loại bỏ trường',
    'LBL_DEFAULT_VALUE' => 'Giá trị mặc định',
    'LBL_SHOW_ADVANCED_OPTIONS' => 'Xem Thuộc tính File nhập',
    'LBL_HIDE_ADVANCED_OPTIONS' => 'Ẩn Thuộc tính File nhập',
    'LBL_SHOW_NOTES' => 'Ghi chú',
    'LBL_HIDE_NOTES' => 'Ẩn Ghi chú',
    'LBL_SAVE_MAPPING_AS' => 'Để lưu cấu hình nhập, cung cấp một tên cho việc lưu cấu hình:',
    'LBL_IMPORT_COMPLETE' => 'Thoát',
    'LBL_IMPORT_COMPLETED' => 'Nhập hoàn tất',
    'LBL_IMPORT_RECORDS' => 'Đang nhập các bản ghi',
    'LBL_IMPORT_RECORDS_OF' => 'của',
    'LBL_IMPORT_RECORDS_TO' => 'a',
    'LBL_CURRENCY' => 'Tiền tệ:',
    'LBL_CURRENCY_SIG_DIGITS' => 'Chữ số tiền tệ quan trọng',
    'LBL_NUMBER_GROUPING_SEP' => 'phân tách 1000s:',
    'LBL_DECIMAL_SEP' => 'Ký hiệu thập phân:',
    'LBL_LOCALE_DEFAULT_NAME_FORMAT' => 'Định dạng Hiển thị tên',
    'LBL_LOCALE_EXAMPLE_NAME_FORMAT' => 'Ví dụ',
    'LBL_LOCALE_NAME_FORMAT_DESC' => '<i>"s" Xưng hô, "f" Tên, "l" Họ</i>',
    'LBL_CHARSET' => 'File mã hóa:',
    'LBL_MY_SAVED_HELP' => 'Sử dụng tùy chọn này để áp dụng các cài đặt nhập được đặt trước của bạn, bao gồm các thuộc tính nhập, ánh xạ và mọi cài đặt kiểm tra trùng lặp, cho lần nhập này.<br><br>Nhấp vào <b>Xóa</b> để xóa ánh xạ cho tất cả người dùng.',
    'LBL_MY_SAVED_ADMIN_HELP' => 'Sử dụng tùy chọn này để áp dụng các cài đặt nhập được đặt trước của bạn, bao gồm các thuộc tính nhập, ánh xạ và mọi cài đặt kiểm tra trùng lặp, cho lần nhập này. <br><br>Nhấp vào <b>Xuất bản</b> để ánh xạ có sẵn cho người dùng khác. <br>Nhấp vào <b>Hủy xuất bản</b> để làm cho ánh xạ không có sẵn cho người dùng khác. <br> Nhấp vào <b>Xóa</b> để xóa ánh xạ cho tất cả người dùng.',
    'LBL_ENCLOSURE_HELP' => '<p><b>Ký tự bao quanh</b> được sử dụng để bao quanh nội dung trường dự định, bao gồm mọi ký tự được sử dụng làm dấu phân cách. <br><br>Ví dụ: Nếu dấu phân cách là dấu phẩy (,) và bao quanh là dấu ngoặc kép ("), <br><b>"Cupertino, California"</b> được nhập vào một trường trong ứng dụng và xuất hiện dưới dạng <b>Cupertino, California</b>. <br>Nếu không có ký tự bao quanh hoặc nếu một ký tự khác, <br><b>"Cupertino, California"</b> được nhập vào hai trường liền kề là <b>"Cupertino</b> và <b>"California"</b>. <br><br>Lưu ý: Tệp nhập có thể không chứa bất kỳ ký tự bao quanh nào. <br> Ký tự bao quanh mặc định cho các tệp được phân cách bằng dấu phẩy và tab được tạo trong Excel là dấu ngoặc kép.</p>',
    'LBL_DATABASE_FIELD_HELP' => 'Cột này hiển thị tất cả các trường trong mô-đun. Chọn một trường để ánh xạ tới dữ liệu trong các dòng tệp nhập.',
    'LBL_HEADER_ROW_HELP' => 'Cột này hiển thị các nhãn trên dòng tiêu đề của tệp nhập.',
    'LBL_DEFAULT_VALUE_HELP' => 'Chỉ ra một giá trị để sử dụng cho trường trong bản ghi được tạo hoặc cập nhật nếu trường trong tệp nhập không chứa dữ liệu.',
    'LBL_ROW_HELP' => 'Cột này hiển thị dữ liệu trên dòng không tiêu đề đầu tiên của tệp nhập. Nếu nhãn dòng tiêu đề xuất hiện trong cột này, bấm Quay lại để chỉ định dòng tiêu đề trong Thuộc tính tệp nhập.',
    'LBL_SAVE_MAPPING_HELP' => 'Nhập tên để lưu cài đặt nhập, bao gồm ánh xạ trường và chỉ mục được sử dụng cho kiểm tra trùng lặp. Cài đặt nhập đã lưu có thể được sử dụng để nhập trong tương lai.',
    'LBL_IMPORT_FILE_SETTINGS_HELP' => 'Trong quá trình tải lên tệp nhập của bạn, một số thuộc tính tệp có thể đã được tự động phát hiện. Xem và quản lý các thuộc tính này, khi<br> cần thiết. Lưu ý: Các cài đặt được cung cấp ở đây liên quan đến quá trình nhập này <br> và sẽ không ghi đè lên Các cài đặt người dùng chung của bạn.',
    'LBL_IMPORT_STARTED' => 'Đã bắt đầu nhập:',
    'LBL_RECORD_CANNOT_BE_UPDATED' => 'Bản ghi có thể không được cập nhật do một vấn đề phân quyền',
    'LBL_DELETE_MAP_CONFIRMATION' => 'Bạn có chắc chắn muốn xóa cài đặt nhập khẩu đã lưu này không?',
    'LBL_THIRD_PARTY_CSV_SOURCES' => 'Nếu dữ liệu tệp nhập được xuất từ bất kỳ nguồn nào sau đây, hãy chọn nguồn dữ liệu đó.',
    'LBL_THIRD_PARTY_CSV_SOURCES_HELP' => 'Chọn nguồn để tự động áp dụng ánh xạ tùy chỉnh để đơn giản hóa quá trình lập bản đồ (bước tiếp theo).',
    'LBL_EXAMPLE_FILE' => 'Tải về bản mẫu tập tin nhập',
    'LBL_CONFIRM_IMPORT' => 'Bạn đã chọn cập nhật hồ sơ trong quá trình nhập. Cập nhật được thực hiện đối với các bản ghi hiện có không thể hoàn tác. Tuy nhiên, hồ sơ được tạo trong quá trình nhập có thể được hoàn tác (xóa), nếu muốn. Nhấp Hủy để chỉ tạo các bản ghi mới hoặc nhấp vào OK để tiếp tục.',
    'LBL_CONFIRM_MAP_OVERRIDE' => 'Cảnh báo: Bạn đã chọn bản đồ tùy chỉnh cho lần nhập này, bạn có muốn tiếp tục không?',
    'LBL_SAMPLE_URL_HELP' => 'Tải xuống tệp nhập mẫu chứa hàng tiêu đề của các trường module. Tệp có thể được sử dụng làm mẫu để tạo tệp nhập có chứa dữ liệu mà bạn muốn nhập.',
    'LBL_AUTO_DETECT_ERROR' => 'Không thể phát hiện dấu phân cách trường và vòng loại trong tệp nhập. Vui lòng xác minh các cài đặt trong Thuộc tính tệp nhập.',
    'LBL_MIME_TYPE_ERROR_1' => 'Các tập tin được chọn không xuất hiện để chứa một danh sách phân cách. Vui lòng kiểm tra loại tập tin. Chúng tôi khuyên dùng các tệp được phân cách bằng dấu phẩy (.csv).',
    'LBL_MIME_TYPE_ERROR_2' => 'Để tiến hành nhập tệp đã chọn, bấm OK. Để tải lên một tệp mới, bấm Thử lại.',
    'LBL_FIELD_DELIMETED_HELP' => 'Dấu phân cách trường chỉ định ký tự được sử dụng để phân tách các cột trường.',
    'LBL_FILE_UPLOAD_WIDGET_HELP' => 'Chọn một tệp chứa dữ liệu được phân tách bằng dấu phân cách, chẳng hạn như tệp được phân cách bằng dấu phẩy hoặc tab. Các tệp thuộc loại .csv được khuyến nghị.',
    'LBL_ERROR_IMPORT_CACHE_NOT_WRITABLE' => 'Nhập Danh mục cache thì không thể ghi được.',
    'LBL_ADD_FIELD_HELP' => 'Sử dụng tùy chọn này để thêm giá trị vào một trường trong tất cả các bản ghi được tạo và/hoặc cập nhật. Chọn trường và sau đó nhập hoặc chọn một giá trị cho trường đó trong cột Giá trị mặc định.',
    'LBL_MISSING_HEADER_ROW' => 'Không có dòng tiêu đề được tìm thấy',
    'LBL_CANCEL' => 'Hủy',
    'LBL_SELECT_DS_INSTRUCTION' => 'Sẵn sàng để bắt đầu nhập khẩu? Chọn các nguồn dữ liệu bạn muốn nhập.',
    'LBL_SELECT_UPLOAD_INSTRUCTION' => 'Chọn một tập tin trên máy tính của bạn có chứa dữ liệu mà bạn muốn chuyển nhập, hoặc tải về các mẫu để có được một khởi đầu cho việc tạo ra các File nhập.',
    'LBL_SELECT_PROPERTY_INSTRUCTION' => 'Đây là cách một số dòng đầu tiên của tệp nhập xuất hiện với các thuộc tính tệp được phát hiện. Nếu một dòng tiêu đề được phát hiện, nó được hiển thị ở dòng trên cùng của bảng. Xem các thuộc tính tệp nhập để thay đổi các thuộc tính được phát hiện và để đặt các thuộc tính bổ sung. Cập nhật cài đặt sẽ cập nhật dữ liệu xuất hiện trong bảng.',
    'LBL_SELECT_MAPPING_INSTRUCTION' => 'Bảng bên dưới chứa tất cả các trường trong mô-đun có thể được ánh xạ tới dữ liệu trong tệp nhập. Nếu tệp chứa một dòng tiêu đề, các cột trong tệp đã được ánh xạ tới các trường khớp. Kiểm tra ánh xạ để đảm bảo rằng chúng là những gì bạn mong đợi và thực hiện các thay đổi khi cần thiết. Để giúp bạn kiểm tra ánh xạ, Dòng 1 hiển thị dữ liệu trong tệp. Hãy chắc chắn ánh xạ tới tất cả các trường bắt buộc (được ghi chú bằng dấu sao).',
    'LBL_SELECT_DUPLICATE_INSTRUCTION' => 'Để tránh tạo bản ghi trùng lặp, chọn trường nào được ánh xạ bạn muốn sử dụng để thực hiện kiểm tra trùng lặp trong khi dữ liệu đang được nhập. Các giá trị trong các bản ghi hiện có trong các trường đã chọn sẽ được kiểm tra đối với dữ liệu trong tệp nhập. Nếu tìm thấy dữ liệu trùng khớp, các dòng trong tệp nhập chứa dữ liệu sẽ được hiển thị cùng với kết quả nhập (trang tiếp theo). Sau đó, bạn sẽ có thể chọn dòng nào trong số các dòng này để tiếp tục nhập.',
    'LBL_DUP_HELP' => 'Dưới đây là các dòng trong tệp nhập không được nhập vì chúng chứa dữ liệu khớp với các giá trị trong các bản ghi hiện có dựa trên kiểm tra trùng lặp. Các dữ liệu khớp được tô sáng. Để nhập lại các dòng này, hãy tải xuống danh sách, thực hiện thay đổi và nhấp vào <b>Nhập lại</b>.',
    'LBL_SUMMARY' => 'Tóm tắt',
    'LBL_OK' => 'Ok',
    'LBL_ERROR_HELP' => 'Dưới đây là các dòng trong tệp nhập không được nhập do lỗi. Để nhập lại các dòng này, hãy tải xuống danh sách, thực hiện thay đổi và nhấp vào <b>Nhập lại</b>',
    'LBL_EXTERNAL_ASSIGNED_TOOLTIP' => 'Để gán các bản ghi mới cho người dùng khác ngoài chính bạn, hãy sử dụng cột Giá trị mặc định để chọn một người dùng khác.',
    'LBL_EXTERNAL_TEAM_TOOLTIP' => 'Để gán các bản ghi mới cho các nhóm khác với (các) nhóm mặc định của bạn, hãy sử dụng cột Giá trị mặc định để chọn các nhóm khác nhau.',
);

global $timedate;
