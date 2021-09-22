#! bin/bash
#为文件夹和用户权限赋值
file="/etc/sudoers"
str="daemon ALL=(ALL) NOPASSWD:ALL"
if [ `grep -c "$str" "$file"` -ne 0 ];then
    echo "存在该权限,无需再次赋值"
    exit 0
else
    sed -i '$a\daemon ALL=(ALL) NOPASSWD:ALL' $file
fi
