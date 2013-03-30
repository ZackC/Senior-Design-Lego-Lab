package com.LegoLabTeam.WebAppTests;

import static org.junit.Assert.assertTrue;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;
/***
 * The class that handles the specific actions on a station's web page.
 * This class is the class where html interaction code is written.
 * This class is used when the same action for multiple page objects 
 * is implemented in the same manner, so the code doesn't have to be
 * written in each test case individually.
 * @author Zack Coker
 *
 */
public class StationDisplayStructure extends DisplayStructure
{
	public static void checkForStringInPage(WebDriver driver, String stringToFind) throws Exception
	{
       assertTrue(driver.findElement(By.cssSelector("BODY")).getText().contains(stringToFind));
		//driver.getPageSource().contians() may also work    
	}
	
	public static void checkPictureDisplayedInPage(WebDriver driver, String pictureName)
	{
		driver.findElement(By.name(pictureName)).isDisplayed();
	}
	
	public static void clickBackButton(WebDriver driver)
	{
		driver.findElement(By.cssSelector("span.ui-btn-text")).click();
	}
}
