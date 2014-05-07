package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class AutoriseerimineSkript {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://endel.mt.ut.ee/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testAutoriseerimineSkript() throws Exception {
    driver.get(baseUrl + "/home");
    driver.findElement(By.linkText("Logi sisse")).click();
    driver.findElement(By.id("email")).clear();
    driver.findElement(By.id("email")).sendKeys("test@test.ee");
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("testendel");
    driver.findElement(By.name("login_submit")).click();
    driver.findElement(By.linkText("Minu tooted")).click();
    driver.findElement(By.name("lisatoode")).click();
    new Select(driver.findElement(By.name("kategooria"))).selectByVisibleText("Marjad");
    driver.findElement(By.id("vili")).clear();
    driver.findElement(By.id("vili")).sendKeys("Mustikad");
    driver.findElement(By.id("sort")).clear();
    driver.findElement(By.id("sort")).sendKeys("Metsmustikas");
    driver.findElement(By.id("asukoht")).clear();
    driver.findElement(By.id("asukoht")).sendKeys("Meenikunno raba");
    driver.findElement(By.name("userfile")).clear();
    driver.findElement(By.name("userfile")).sendKeys("C:\\Users\\Heiti\\Desktop\\mustikas2.jpg");
    driver.findElement(By.name("addbutton")).click();
    driver.findElement(By.linkText("Minu tooted")).click();
    // Warning: assertTextPresent may require manual changes
    assertTrue(driver.findElement(By.cssSelector("BODY")).getText().matches("^[\\s\\S]*Metsmustikas[\\s\\S]*$"));
    driver.findElement(By.cssSelector("span.glyphicon.glyphicon-log-out")).click();
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
