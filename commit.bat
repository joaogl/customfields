@ECHO ON

git add --all
git status 
git commit -m %1
git push -u origin master