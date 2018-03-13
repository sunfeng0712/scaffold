	# kubernetes devops

## 编译打包代码
```bash
composer update -vvv
php init 
...
tar -p --exclude=.release --exclude=kubernetes --exclude=docker_builder --exclude=.ht --exclude=.svn --exclude=.git --exclude=.gitignore --exclude=.DS_Store -czvf baolu.tar.gz *
mv baolu.tar.gz kubernetes/docker_builder/
```

## 构建发布镜像
```bash
docker build -t reg.x1ankun.com/...:v.1.0.0 kubernetes/docker_builder/
docker push reg.x1ankun.com/...:v...
```

## 修改kubernetes.yaml

## 发布
