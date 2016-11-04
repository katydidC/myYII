
jQuery(function($){
    
    $.supersized({
        
        // ����
        slide_interval     : 4000,    // ת��֮��ĳ���
        transition         : 1,    // 0 - �ޣ�1 - ���뵭����2 - ��������3 - �������ң�4 - ���ף�5 - ��������6 - ��תľ���Ҽ���7 - ����תľ��
        transition_speed   : 1000,    // ת���ٶ�
        performance        : 1,    // 0 - ������1 - ����ٶ�/������2 - ���ŵ�ͼ�����������ŵ�ת���ٶ�//���������ڻ��/ IE�������������Webkit�ģ�

        // ��С��λ��
        min_width          : 0,    // ��С�����ȣ�������Ϊ��λ��
        min_height         : 0,    // ��С����߶ȣ�������Ϊ��λ��
        vertical_center    : 1,    // ��ֱ���б���
        horizontal_center  : 1,    // ˮƽ���ĵı���
        fit_always         : 0,    // ͼ������ᳬ��������Ŀ�Ȼ�߶ȣ����Է��ӡ��ߴ磩
        fit_portrait       : 1,    // ����ͼ�񽫲�����������߶�
        fit_landscape      : 0,    // ���۵�ͼ�񽫲�������ȵ������

        // ���
        slide_links        : 'blank',    // ���𻷽�Ϊÿ�Żõ�Ƭ��ѡ��ٵģ�'��'��'��'��'��'��
        slides             : [    // �õ�ƬӰ��
                                 {image : APP_URL + 'images/1.jpg'},
                                 {image : APP_URL + 'images/2.jpg'},
                                 {image : APP_URL + 'images/3.jpg'},
                                 {image : APP_URL + 'images/4.jpg'},
                                 {image : APP_URL + 'images/5.jpg'},
                                 {image : APP_URL + 'images/6.jpg'}
                       ]

    });

});
