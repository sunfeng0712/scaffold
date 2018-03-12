#!/bin/bash
echo '============ fis build start ============'

#初始化
rm -rf ../plugin ../smarty.conf ../domain.conf ../config/fis/* ../views/* ../web/static/* 
echo 'rm fis3 build files ok.'

#编译
fis3 release prod -r layouts -d ../
echo 'release layouts ok.'
fis3 release prod -r common -d ../
echo 'release common ok.'
fis3 release prod -r home -d ../
echo 'release home ok.'

#删除测试数据
# rm -rf ../test ../web/static/common/test ../web/static/home/test
# echo 'rm fis3 test files ok.'

echo '============ fis build end ============'